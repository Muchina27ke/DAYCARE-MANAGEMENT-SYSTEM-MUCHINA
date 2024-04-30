<?php
class activityModel
{
    public static function mdlShowActivities($table, $item, $value)
    {
        if ($item == "id") {

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
    public static function mdlAddActivity($table, $data)
    {
        try {
            // Establish database connection
            $connection = connection::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement
            $stmt = $connection->prepare("INSERT INTO $table (class_id, subject_id, time_start, time_end, day) VALUES (:class_id, :subject_id, :time_start, :time_end, :day)");

            // Bind parameters
            $stmt->bindParam(':class_id', $data['group']);
            $stmt->bindParam(':subject_id', $data['activity']);
            $stmt->bindParam(':time_start', $data['startime']);
            $stmt->bindParam(':time_end', $data['endtime']);
            $stmt->bindParam(':day', $data['day']);

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
