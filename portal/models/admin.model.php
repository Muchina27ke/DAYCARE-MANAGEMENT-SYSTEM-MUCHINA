<?php
class adminModel
{

    public static function mdlShowAdminLogin($table, $item, $value)
    {
    if ($item == "admin_id") {

        $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->closeCursor();

        $stmt = null;
    }
}

    public static function mdlShowAdmin($table, $item, $value)
    {
        if ($item == "admin_id") {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->closeCursor();

            $stmt = null;
        } elseif ($item != null) {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->closeCursor();

            $stmt = null;
        } else {
            $stmt = connection::connect()->prepare("SELECT * FROM $table");

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->closeCursor();

            $stmt = null;
        }
    }
    public static function mdlAddAdmin($table, $data){
        try {
            $stmt = connection::connect()->prepare("INSERT INTO $table (admin_id, name, email, password, phone, level, dateAdded) VALUES (:admin_id, :name, :email, :password, :phone, :level, :dateAdded)");
            
            $stmt->bindParam(":admin_id", $data["custom_id"], PDO::PARAM_STR);
            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
            $stmt->bindParam(":level", $data["role"], PDO::PARAM_INT);
            $stmt->bindParam(":dateAdded", $data["date"], PDO::PARAM_STR);
        
            if ($stmt->execute()) {
                // Close the statement and set it to null
                $stmt->closeCursor();
                $stmt = null;
                return 'ok';
            } else {
                // Close the statement and set it to null
                $stmt->closeCursor();
                $stmt = null;
                return 'error';
            }
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return 'error';
        }
    }
    
    public static function getNextAdminNumericPart()
{
    try {
        // Define the query to retrieve the maximum numeric part of the admin ID
        $query = "SELECT MAX(CAST(SUBSTRING(admin_id, 4) AS UNSIGNED)) AS max_numeric_part
                  FROM admin";

        // Prepare the query
        $stmt = connection::connect()->prepare($query);

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the cursor
        $stmt->closeCursor();

        // Extract the maximum numeric part
        $maxNumericPart = $result['max_numeric_part'];

        // Calculate the next available numeric part
        if ($maxNumericPart !== null) {
            return $maxNumericPart + 1;
        } else {
            return 1;
        }
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display an error message)
        echo "Error: " . $e->getMessage();
        return null; // Return null in case of error
    }
}

        
}
