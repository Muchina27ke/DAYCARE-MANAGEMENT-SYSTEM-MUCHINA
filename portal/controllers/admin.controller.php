<?php
class adminController
{
    static public function ctrShowAdmin($item, $value)
    {
        $table = "admin";
        $answer = adminModel::mdlShowAdmin($table, $item, $value);
        return $answer;
    }

    static public function addAdmin()
    {
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Set the default timezone to Nairobi
            date_default_timezone_set('Africa/Nairobi');

            // Create a DateTime object with the current date and time in Nairobi timezone
            $dateTime = new DateTime();

            // Format the DateTime as a string
            $dateTimeStr = $dateTime->format('Y-m-d H:i:s');
            $encryptpass = password_hash($_POST["adminpassword"], PASSWORD_BCRYPT);

            // Generate custom ID
            $customIdPrefix = 'adm';
            $numericPart = adminModel::getNextAdminNumericPart(); // Get the next available numeric part
            $customId = $customIdPrefix . str_pad($numericPart, 3, '0', STR_PAD_LEFT); // Generate the custom ID

            $data = array(
                'custom_id' => $customId,
                'name' => $_POST["adminName"],
                'password' => $encryptpass,
                'email' => $_POST["adminemail"],
                'phone' => $_POST["adminphone"],
                'role' => $_POST['role'],
                'date' => $dateTimeStr
            );

            $table = 'admin';
            $answer = adminModel::mdladdAdmin($table, $data);
            if ($answer === 'ok') {
                // Provide success message to the user
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Account created",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                }).then(function(result){
                    if(result.value){
                        window.location = "admin";
                    }
                });
                </script>';

                $mailContent = 'Your Swiss Bear Administrative account has been created!' . "\n\n" .
                    'ADMIN ID:' . $customId . "\n\n" .
                    'Your temporary password is: ' . $_POST["adminpassword"] . "\n\n" .
                    '**Please change your password to a strong one after logging in for security reasons.**';
                EmailController::sendEmail($data['email'], 'Account created', $mailContent);
            } else {
                // Provide error message to the user
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "An error occurred, please try again",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                }).then(function(result){
                    if(result.value){
                        window.location = "admin";
                    }
                });
                </script>';
            }
        }
    }
}
