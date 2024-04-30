<?php
class paymentModel
{
    public static function mdlShowPayments($table, $item, $value)
    {
        if ($item == "payment_id" || $item == "student_id") {

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

    static public function addPayment($data)
    {

        $pdo = connection::connect();
        $stmt = $pdo->prepare("INSERT INTO payment (title, payment_type, invoice_id, student_id, method, description, amount) VALUES (:title, :payment_type, :invoice_id, :student_id, :method, :description, :amount)");
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':payment_type', $data['payment_type'], PDO::PARAM_STR);
        $stmt->bindParam(':invoice_id', $data['invoice_id'], PDO::PARAM_INT);
        $stmt->bindParam(':student_id', $data['student_id'], PDO::PARAM_INT);
        $stmt->bindParam(':method', $data['method'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(':amount', $data['amount'], PDO::PARAM_STR);

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
    }
}
