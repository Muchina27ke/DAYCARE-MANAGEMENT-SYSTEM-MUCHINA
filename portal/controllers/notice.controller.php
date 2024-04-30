<?php
class noticeController
{
    /*=============================================
	SHOW Tutors
	=============================================*/

    static public function ctrShownotice($item, $value)
    {

        $table = "noticeboard";

        $answer = noticeModel::mdlShownotice($table, $item, $value);

        return $answer;
    }

    static public function addNotice()
    {
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Set the default timezone to Nairobi
            date_default_timezone_set('Africa/Nairobi');

            // Create a DateTime object with the current date and time in Nairobi timezone
            $dateTime = new DateTime();

            // Format the DateTime as a string
            $dateTimeStr = $dateTime->format('Y-m-d H:i:s');

            // Prepare data for insertion
            $data = array(
                'notice_title' => $_POST["noticeTitle"],
                'notice' => $_POST["noticeContent"],
                'status' => 1, // Assuming status is submitted via the form
                'create_timestamp' => $dateTimeStr // Timestamp generated previously
            );


            // Table name
            $table = 'noticeboard';

            // Call the model method to add the notice
            $response = noticeModel::mdlAddNotice($table, $data);

            // Check the response from the model
            if ($response === 'ok') {
                // Provide success message to the user
                echo '<script>
            Swal.fire({
                icon: "success",
                title: "Notice added successfully",
                showConfirmButton: true,
                confirmButtonText: "Close"
            }).then(function(result){
                if(result.value){
                    window.location = "notice"; 
                }
            });
            </script>';
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
                    window.location = "notice"; 
                }
            });
            </script>';
            }
        }
    }
}
