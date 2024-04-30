<?php
class noticeModel
{
    public static function mdlShownotice($table, $item, $value)
    {
        if ($item == "notice_id"|| $item=="status") {

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

    static public function mdlEditNotice($table, $data){

        $stmt = connection::connect()->prepare("UPDATE $table SET notice_title=:notice_title, notice=:notice, status=:status WHERE notice_id = :notice_id");
    
        $stmt->bindParam(":notice_id", $data["notice_id"], PDO::PARAM_INT);
        $stmt->bindParam(":notice_title", $data["notice_title"], PDO::PARAM_STR);
        $stmt->bindParam(":notice", $data["notice"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
    
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


    static public function mdlAddNotice($table, $data)
    {
        $stmt = connection::connect()->prepare("INSERT INTO $table (notice_title, notice, create_timestamp, status) VALUES (:notice_title, :notice, :create_timestamp, :status)");

        $stmt->bindParam(":notice_title", $data["notice_title"], PDO::PARAM_STR);
        $stmt->bindParam(":notice", $data["notice"], PDO::PARAM_STR);
        $stmt->bindParam(":create_timestamp", $data["create_timestamp"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);

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
    static public function mdlDeleteStore($table, $data){

		$stmt = connection::connect()->prepare("DELETE FROM $table WHERE notice_id = :notice_id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_STR);

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
?>



