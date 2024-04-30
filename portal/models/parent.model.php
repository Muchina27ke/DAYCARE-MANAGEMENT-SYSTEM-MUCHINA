<?php
class parentModel
{
    public static function mdlShowParentLogin($table, $item, $value)
    {
        if ($item == "parent_id"|| $item == "email") {

            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->closeCursor();

            $stmt = null;
        }
    }
    public static function mdlShowParent($table, $item, $value)
    {
        if ($item == "parent_id") {

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

    public static function mdlAddParent($table, $data)
    {
        try {
            $stmt = connection::connect()->prepare("INSERT INTO $table (name, email, password, phone, address, profession, date) VALUES (:name, :email, :password, :phone, :address, :profession, :date)");

            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
            $stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
            $stmt->bindParam(":profession", $data["profession"], PDO::PARAM_STR);
            $stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);

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
}
