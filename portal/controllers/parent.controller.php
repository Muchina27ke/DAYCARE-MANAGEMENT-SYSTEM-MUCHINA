<?php
class parentController
{
    /*=============================================
    SHOW Parents
    =============================================*/

    static public function ctrShowParents($item, $value)
    {
        $table = "parent";
        $answer = parentModel::mdlShowParent($table, $item, $value);
        return $answer;
    }

    static public function addparent()
    {
        // Check if the form has been submitted
        if (isset($_POST["register"])) {
            // Set the default timezone to Nairobi
            date_default_timezone_set('Africa/Nairobi');

            // Create a DateTime object with the current date and time in Nairobi timezone
            $dateTime = new DateTime();

            // Format the DateTime as a string
            $dateTimeStr = $dateTime->format('Y-m-d H:i:s');

            // Fetch parent data from the database
            $table = 'parent';
            $item = null;
            $value = null;
            $parent = parentModel::mdlShowParentLogin($table, $item, $value);
            $encryptpass = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $data = array(
                'name' => $_POST["name"],
                'password' => $encryptpass,
                'email' => $_POST["email"],
                'phone' => $_POST["phone"],
                'address' => $_POST['address'],
                'profession' => 'not added',
                'date' => $dateTimeStr // Changed 'createdate' to 'date'
            );


            if (empty($parent)) {
                // Add parent to the database since there are no existing parents
                $answer = parentModel::mdlAddParent($table, $data);
                if ($answer === 'ok') {
                    // Redirect user to login page
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Account created, proceed to login",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "portal/login";
                            }
                        });
                    </script>';
                } else {
                    // Display error message
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "An error occurred, please try again",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "register.php";
                            }
                        });
                    </script>';
                }
            } else {
                // Check if the data already exists in the database
                $dataExists = false;
                foreach ($parent as $parentItem) {
                    if ($parentItem['email'] === $data['email'] || $parentItem['phone'] === $data['phone']) {
                        $dataExists = true;
                        break; // Exit the loop once a match is found
                    }
                }

                if ($dataExists) {
                    // Display error message that the profile already exists
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "You already have a profile.",
                            showConfirmButton: true,
                            confirmButtonText: "Close"
                        }).then(function(result){
                            if(result.value){
                                window.location = "portal/login";
                            }
                        });
                    </script>';
                } else {
                    // Add parent to the database since no match was found
                    $answer = parentModel::mdlAddParent($table, $data);
                    if ($answer === 'ok') {
                        // Redirect user to login page
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Account created, proceed to login",
                                showConfirmButton: true,
                                confirmButtonText: "Close"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "portal/login";
                                }
                            });
                        </script>';
                    } else {
                        // Display error message
                        echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "An error occurred, please try again",
                                showConfirmButton: true,
                                confirmButtonText: "Close"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "register.php";
                                }
                            });
                        </script>';
                    }
                }
            }
        }
    }
}
