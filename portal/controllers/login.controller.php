<?php

class LoginController {

    static public function validateParentLogin($email, $password) {
        if (isset($_POST["login"])) {
            // Check if the email and password are provided
            if (!empty($email) && !empty($password)) {

                // Set the default timezone to Nairobi
                date_default_timezone_set('Africa/Nairobi');

                // Create a DateTime object with the current date and time in Nairobi timezone
                $dateTime = new DateTime();

                // Format the DateTime as a string
                $dateTimeStr = $dateTime->format('Y-m-d H:i:s');

                // Retrieve parent information from the database
                $table = 'parent';
                $item = 'email';
                $value = $email;
                $parentInfo = parentModel::mdlShowParentLogin($table, $item, $value);

                // Check if the parent exists and if the password matches
                if ($parentInfo && $parentInfo["email"] == $email && password_verify($password, $parentInfo["password"])) {
                    // Parent login successful
                    return 'parent';
                } else {
                    // Invalid email or password
                    return false;
                }
            } else {
                // Email or password not provided
                return false;
            }
        } else {
            // Login form not submitted
            return false;
        }
    }

    // Example function to validate admin login
    static public function validateAdminLogin($id, $password) {
        if (isset($_POST["login"])) {
            // Check if the ID and password are provided
            if (!empty($id) && !empty($password)) {

                // Set the default timezone to Nairobi
                date_default_timezone_set('Africa/Nairobi');

                // Create a DateTime object with the current date and time in Nairobi timezone
                $dateTime = new DateTime();

                // Format the DateTime as a string
                $dateTimeStr = $dateTime->format('Y-m-d H:i:s');

                // Retrieve admin information from the database
                $table = 'admin';
                $item = 'admin_id';
                $value = $id;
                $adminInfo = AdminModel::mdlShowAdminLogin($table, $item, $value);

                // Check if the admin exists and if the password matches
                if ($adminInfo && $adminInfo["admin_id"] == $id && password_verify($password, $adminInfo["password"])) {
                    // Admin login successful
                    return 'admin';
                } else {
                    // Invalid ID or password
                    return false;
                }
            } else {
                // ID or password not provided
                return false;
            }
        } else {
            // Login form not submitted
            return false;
        }
    }

    // Example function to validate teacher login
    static public function validateTeacherLogin($id, $password) {
        if (isset($_POST["login"])) {
            // Check if the ID and password are provided
            if (!empty($id) && !empty($password)) {

                // Set the default timezone to Nairobi
                date_default_timezone_set('Africa/Nairobi');

                // Create a DateTime object with the current date and time in Nairobi timezone
                $dateTime = new DateTime();

                // Format the DateTime as a string
                $dateTimeStr = $dateTime->format('Y-m-d H:i:s');

                // Retrieve teacher information from the database
                $table = 'teacher';
                $item = 'teacher_id';
                $value = $id;
                $teacherInfo = tutorModel::mdlShowTutorsLogin($table, $item, $value);

                // Check if the teacher exists and if the password matches
                if ($teacherInfo && $teacherInfo["teacher_id"] == $id && password_verify($password, $teacherInfo["password"])) {
                    // Teacher login successful
                    return 'teacher';
                } else {
                    // Invalid ID or password
                    return false;
                }
            } else {
                // ID or password not provided
                return false;
            }
        } else {
            // Login form not submitted
            return false;
        }
    }
}

?>
