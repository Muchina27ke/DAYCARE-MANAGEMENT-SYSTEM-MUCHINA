<?php
class classModel
{
    public static function mdlShowClasssingle($table, $item, $value)
    {
        if ($item == "class_id" || $item == "teacher_id" || $item == "student_id") {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->closeCursor();

            $stmt = null;
        }
    }
    public static function mdlShowClass($table, $item, $value)
    {
        if ($item == "class_id" || $item == "teacher_id" || $item == "student_id") {

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
    public static function mdlAddClass($table, $data)
    {
        try {
            // Establish database connection
            $connection = connection::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement
            $stmt = $connection->prepare("INSERT INTO $table (name, teacher_id, fee) VALUES (:name, :teacher_id, :fee)");

            // Bind parameters
            $stmt->bindParam(':name', $data['class']);
            $stmt->bindParam(':teacher_id', $data['tutor']);
            $stmt->bindParam(':fee', $data['amount']);
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
}
