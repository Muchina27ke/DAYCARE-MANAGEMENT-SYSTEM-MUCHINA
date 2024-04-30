<?php
class kidsController
{
    /*=============================================
	SHOW kids
	=============================================*/

    static public function ctrShowKids($item, $value)
    {

        $table = "student";

        $answer = kidModel::mdlShowKid($table, $item, $value);

        return $answer;
    }

    public static function addAdmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['kname'];
            $birthday = $_POST['DOB'];
            $sex = $_POST['gender'];
            $religion = $_POST['religion'];
            $parent_id = $_POST['parent'];
            $class_id = $_POST['class'];
            $address='none';

            // You can perform validation and sanitation here

            // Assuming you have a function to add admission data to the database
            // Replace the following line with your actual implementation
            $result = kidModel::addAdmission($name, $birthday, $sex, $religion, $address, $class_id, $parent_id);

            if ($result === 'ok') {
                // Success alert
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Child admitted successfully!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "admission";
                            }
                        });
                    </script>';
            } else {
                // Error alert
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Failed to admit child. Please try again later!",
                        });
                    </script>';
            }
        }
    }
}
