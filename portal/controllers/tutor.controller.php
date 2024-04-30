<?php
class tutorController
{
    /*=============================================
	SHOW Tutors
	=============================================*/

    static public function ctrShowTutors($item, $value)
    {

        $table = "teacher";

        $answer = tutorModel::mdlShowTutors($table, $item, $value);

        return $answer;
    }

    static public function addTeacher()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $name = $_POST['name'];
            $birthday = $_POST['birthday'];
            $sex = $_POST['sex'];
            $religion = $_POST['religion'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Generate custom ID
            $customIdPrefix = 'tr';
            $numericPart = rand(1, 9999); // Generate a random numeric part
            $customId = $customIdPrefix . str_pad($numericPart, 4, '0', STR_PAD_LEFT); // Generate the custom ID

            $encryptpass = password_hash($password, PASSWORD_BCRYPT);
            // Prepare data array
            $data = array(
                'custom_id' => $customId,
                'name' => $name,
                'birthday' => $birthday,
                'sex' => $sex,
                'religion' => $religion,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'password' =>   $encryptpass
            );


            // Call the model method to add the teacher
            $response = tutorModel::addTeacher($data);

            // Check the response from the model
            if ($response === 'ok') {
                // Success message using SweetAlert
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Teacher added successfully!",
                            timer: 3000,
                            showConfirmButton: false
                        }).then((result) => {
                            window.location.href = "tutor";
                        });
                      </script>';
                $mailContent = 'Your Swiss Bear Administrative account has been created!' . "\n\n" .
                    'ADMIN ID:' . $customId . "\n\n" .
                    'Your temporary password is: ' . $_POST["password"] . "\n\n" .
                    '**Please change your password to a strong one after logging in for security reasons.**';
                EmailController::sendEmail($data['email'], 'Account created', $mailContent);
            } else {
                // Error message using SweetAlert
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "An error occurred while adding the teacher. Please try again later.",
                            timer: 3000,
                            showConfirmButton: false
                        });
                      </script>';
            }
        }
    }
}
