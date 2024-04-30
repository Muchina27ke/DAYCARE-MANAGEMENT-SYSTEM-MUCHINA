<?php
class activityController
{
    static public function ctrShowActivity($item, $value)
    {
        $table = "activity";
        $answer = activityModel::mdlShowActivities($table, $item, $value);
        return $answer;
    }
    static public function ctrShowSubject($item, $value)
    {
        $table = "subject";
        $answer = activityModel::mdlShowActivities($table, $item, $value);
        return $answer;
    }

    public static function ctrAddActivity()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $table='class_routine';
            $data = array(
                'group' => $_POST["group"],
                'activity' => $_POST["activity"],
                'startime' => $_POST["startime"],
                'endtime' => $_POST["endtime"],
                'day' => $_POST['day'],
            );

            // You can perform validation and sanitation here

            // Assuming you have a function to add admission data to the database
            // Replace the following line with your actual implementation
            $result = activityModel::mdlAddActivity($table,$data);

            if ($result === 'ok') {
                // Success alert
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Activity added successfully!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "activities";
                            }
                        });
                    </script>';
            } else {
                // Error alert
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Failed to add activity. Please try again later!",
                        });
                    </script>';
            }
        }
    }
}
