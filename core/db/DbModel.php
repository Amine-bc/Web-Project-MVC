<?php
/**
 * User: TheCodeholic
 * Date: 7/10/2020
 * Time: 9:19 AM
 */

namespace app\core\db;

use app\core\App;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;
    public function findFirst($limit,$offset)
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName LIMIT $limit OFFSET $offset; ");
        $statement->execute();
        return $statement->fetchAll();
    }
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

    public static function findOne($where)
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
}