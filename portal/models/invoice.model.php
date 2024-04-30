<?php
class invoiceModel
{
    public static function mdlShowInvoice($table, $item, $value)
    {
        if ($item == "invoice_id" || $item == "student_id") {

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
    public static function mdlAddInvoice($student, $title, $desc, $amount, $due, $status)
    {
        try {
            // Establish database connection
            $connection = connection::connect();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement
            $stmt = $connection->prepare("INSERT INTO invoice (student_id, title, description, amount, due, status) VALUES (:student_id, :title, :description, :amount, :due, :status)");

            // Bind parameters
            $stmt->bindParam(':student_id', $student);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $desc);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':due', $due);
            $stmt->bindParam(':status', $status);

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
