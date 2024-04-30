<?php
class AttendanceController
{
    public static function studentAttendanceExists($studentId, $date)
    {
        $table = "attendance";

        if ($studentId != null && $date != null) {
            $stmt = connection::connect()->prepare("SELECT * FROM $table WHERE student_id = :student_id AND date = :date");

            $stmt->bindParam(":student_id", $studentId, PDO::PARAM_INT);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetch();

            $stmt->closeCursor();

            $stmt = null;

            return !empty($result);
        } else {
            return false;
        }
    }
}
?>

