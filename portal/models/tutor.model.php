<?php
class tutorModel
{

    public static function mdlShowTutorsLogin($table, $item, $value)
    {
        if ($item == "teacher_id") {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->closeCursor();

            $stmt = null;
        }
    }
    public static function mdlShowTutors($table, $item, $value)
    {
        if ($item == "teacher_id") {

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
    static public function addTeacher($data)
    {
        try {
            $stmt = connection::connect()->prepare("INSERT INTO teacher (teacher_id, name, birthday, sex, religion, address, phone, email, password) VALUES (:teacher_id, :name, :birthday, :sex, :religion, :address, :phone, :email, :password)");
            $stmt->bindParam(":teacher_id", $data["custom_id"], PDO::PARAM_STR);
            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":birthday", $data["birthday"], PDO::PARAM_STR);
            $stmt->bindParam(":sex", $data["sex"], PDO::PARAM_STR);
            $stmt->bindParam(":religion", $data["religion"], PDO::PARAM_STR);
            $stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
            $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return 'ok';
            } else {
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
            $query = "SELECT MAX(CAST(SUBSTRING(teacher_id, 2) AS UNSIGNED)) AS max_numeric_part
                      FROM teacher";

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
