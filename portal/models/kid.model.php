<?php
class kidModel
{
    public static function mdlShowKid($table, $item, $value)
    {
        if ($item == "student_id" || $item == "parent_id" || $item == "class_id") {

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
    public static function addAdmission($name, $birthday, $sex, $religion, $address, $class_id, $parent_id)
    {
        try {
            // Establish database connection
            $connection = connection::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement
            $stmt = $connection->prepare("INSERT INTO student (name, birthday, sex, religion, address, class_id, parent_id, dateAdded) VALUES (:name, :birthday, :sex, :religion, :address, :class_id, :parent_id, NOW())");

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':sex', $sex);
            $stmt->bindParam(':religion', $religion);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':class_id', $class_id);
            $stmt->bindParam(':parent_id', $parent_id);

            // Execute the statement
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->rowCount() > 0) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
            return 'error';
        } finally {
            // Close the connection
            $connection = null;
        }
    }
}
