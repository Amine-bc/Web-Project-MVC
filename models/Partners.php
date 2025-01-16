<?php

namespace app\models;

use app\core\db\DbModel;
use PDO;
use PDOException;

class Partners extends DbModel
{
    public array $Partners =[];
    public static function tableName(): string
    {
        return 'partners';
    }
    public function setPartners(){
            $this->Partners = self::findAll();
            $_SESSION['partners'] = $this->Partners;
    }
    public function applyFilter($filter){
        if(isset($_SESSION['partners']) && empty($this->Partners)){
            $this->Partners = $_SESSION['partners'];
            //var_dump($this->Partners);
        }
        $filteredPartners = [] ;
        if(!empty($this->Partners) and !empty($filter)){
            foreach ($this->Partners as $partner) {
                $matchesAllConditions = true; // Start by assuming the partner matches all conditions

                foreach ($filter as $field => $value) {
                    // If any condition is not met, set $matchesAllConditions to false and break the loop
                    if ($partner[$field] != $value) {
                        $matchesAllConditions = false;
                        break; // No need to check the remaining conditions for this partner
                    }
                }

                // If all conditions matched, add the partner to the filtered list
                if ($matchesAllConditions) {
                    $filteredPartners[] = $partner;
                }
            }
        }else{
            return $this->Partners;
        }
        return $filteredPartners;
    }
    public function rules(): array
    {
        return [];
    }

    public static function stats() {
        // SQL query for counting partners in each category
        $countQuery = "
        SELECT 
            category,
            COUNT(*) AS partner_count
        FROM 
            Partners
        GROUP BY 
            category
    ";

        // SQL query for calculating the average reductions
        $averageQuery = "
        SELECT 
            AVG(reduction_classique) AS avg_reduction_classique,
            AVG(reduction_jeunes) AS avg_reduction_jeunes,
            AVG(reduction_premium) AS avg_reduction_premium
        FROM 
            Partners
    ";

        try {
            // Execute the count query
            $countStatement = self::prepare($countQuery);
            $countStatement->execute();
            $countResults = $countStatement->fetchAll(PDO::FETCH_ASSOC);

            // Execute the average query
            $averageStatement = self::prepare($averageQuery);
            $averageStatement->execute();
            $averageResults = $averageStatement->fetch(PDO::FETCH_ASSOC);

            // Return the results as an associative array
            return [
                'partner_counts' => $countResults,
                'average_reductions' => $averageResults
            ];
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            error_log("Error in stats method: " . $e->getMessage());
            return false; // Return false if something went wrong
        }
    }


}