<?php


namespace app\core\db;

use app\core\App;
use app\core\Model;
use PDO;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;
    public static function primaryKey(): string
    {
        return 'user_id';
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }
    public function insertRow(array $attributes)
    {
        $tableName = $this->tableName();

        // Generate columns and values placeholders for the insert statement
        $columns = implode(", ", array_keys($attributes));
        $placeholders = implode(", ", array_map(fn($attr) => ":$attr", array_keys($attributes)));

        // Prepare the SQL statement
        $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
        $statement = self::prepare($sql);

        // Bind values for the insert statement
        foreach ($attributes as $key => $value) {
            $statement->bindValue(":$key", $value);
        }


        // Return the last inserted ID (or true if you don't need it)
        return  $statement->execute();

    }

    public function updateRows(array $attributes, array $conditions = [])
    {
        $tableName = $this->tableName();

        // Generate SET clause for the update
        $setClause = implode(", ", array_map(fn($attr) => "$attr = :$attr", array_keys($attributes)));

        // Generate WHERE clause for the conditions (if provided)
        $whereClause = "";
        if (!empty($conditions)) {
            $whereParts = array_map(fn($key) => "$key = :cond_$key", array_keys($conditions));
            $whereClause = "WHERE " . implode(" AND ", $whereParts);
        }

        // Prepare the SQL statement
        $sql = "UPDATE $tableName SET $setClause $whereClause";
        $statement = self::prepare($sql);
        // Bind values for SET clause
        foreach ($attributes as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Bind values for WHERE clause
        foreach ($conditions as $key => $value) {
            $statement->bindValue(":cond_$key", $value);
        }

        // Execute the statement
        $statement->execute();
        return true;
    }


    public static function prepare($sql): \PDOStatement
    {
        return App::$app->db->prepare($sql);
    }

    public static function findWhereinTable(array $where, string $m2mTableName, string $joinColumn, string $filterColumn): array
    {
        // Get the table name of the current model
        $tableName = static::tableName();

        // Extract the column names from the $where condition
        $attributes = array_keys($where);

        // Create the WHERE clause dynamically
        $sqlConditions = implode(" AND ", array_map(fn($attr) => "$m2mTableName.$attr = :$attr", $attributes));

        // Construct the SQL query
        $sql = "
    SELECT $tableName.*, $m2mTableName.*
    FROM $tableName
     JOIN $m2mTableName 
    WHERE $sqlConditions
";


        // Prepare the SQL statement
        $statement = self::prepare($sql);

        // Bind the values for the placeholders in the query
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Execute the query
        $statement->execute();

        // Fetch and return the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findWhereinTableJoin(array $where, string $m2mTableName, string $joinColumn, string $filterColumn): array
    {
        // Get the table name of the current model
        $tableName = static::tableName();

        // Extract the column names from the $where condition
        $attributes = array_keys($where);

        // Create the WHERE clause dynamically
        $sqlConditions = implode(" AND ", array_map(fn($attr) => "$m2mTableName.$attr = :$attr", $attributes));
        // Construct the SQL query
        $sql = "
    SELECT $tableName.*, $m2mTableName.*
    FROM $tableName
     LEFT JOIN $m2mTableName on $m2mTableName.$joinColumn = $tableName.$joinColumn
    WHERE $sqlConditions
    ";


        // Prepare the SQL statement
        $statement = self::prepare($sql);

        // Bind the values for the placeholders in the query
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Execute the query
        $statement->execute();

        // Fetch and return the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        // Ensure the ID is valid
        if (empty($id)) {
            throw new InvalidArgumentException("ID cannot be empty");
        }

        // Get the table name
        $tableName = static::tableName();

        // Retrieve the primary key column dynamically
        $primaryKeyColumn = self::getPrimaryKeyColumn($tableName);

        // Prepare the DELETE SQL query
        $sql = "DELETE FROM $tableName WHERE $primaryKeyColumn = :id";

        // Prepare the statement
        $statement = self::prepare($sql);

        // Bind the ID value to the query
        $statement->bindValue(":id", $id);

        // Execute the query and check if the deletion was successful
        if ($statement->execute()) {
            return true; // Deletion was successful
        } else {
            return false; // Something went wrong
        }
    }
    public static function getPrimaryKeyColumn($tableName)
    {
        // Prepare the SQL query to get the primary key column from the information schema
        $sql = "SELECT COLUMN_NAME
            FROM information_schema.key_column_usage
            WHERE table_name = :table_name AND constraint_name = 'PRIMARY'";

        // Prepare and execute the query
        $statement = self::prepare($sql);
        $statement->bindValue(":table_name", $tableName);
        $statement->execute();

        // Fetch the result (primary key column name)
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['COLUMN_NAME'] : null;
    }

    public static function findWhere($where): array
    {

        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchAll();
    }
    public static function findOneObject($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);

    }

    public static function findAll()
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->fetchAll();
    }
    public function findFirst($limit,$offset)
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName LIMIT $limit OFFSET $offset; ");
        $statement->execute();
        return $statement->fetchAll();
    }
}