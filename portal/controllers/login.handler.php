<?php
require('login.controller.php');

class handleLogin
{
    public static function loginHandler()
    {
        // Check if the login form is submitted
        if (isset($_POST["login"])) {
            // Get username and password from the form
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Check the type of user and validate login
            if (strpos($username, '@') !== false) {
                // Parent login
                $result = LoginController::validateParentLogin($username, $password);
                if ($result === 'parent') {
                    // Store user information in session variables
                    $_SESSION["beginSession"] = "ok";
                    $_SESSION['user_type'] = 'parent';
                    $_SESSION['username'] = $username;

                    // Redirect to portal folder upon successful login using JavaScript
                    echo '<script>
                              window.location.href = "/sbs/portal";
                          </script>';
                } else {
                    // Display error message or redirect to login page
                    echo '<script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: false,
                                    didOpen: (toast) => {
                                        toast.addEventListener("mouseenter", Swal.stopTimer);
                                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                                    }
                                });
                                
                                Toast.fire({
                                    icon: "error",
                                    title: "Invalid credentials"
                                }).then(function () {
                                    // Code to execute after the alert is closed
                                    window.location = "login";
                                });
                            </script>';
                }
            } elseif (strpos($username, 'adm') === 0) {
                // Admin login
                $result = LoginController::validateAdminLogin($username, $password);
                if ($result === 'admin') {
                    // Store user information in session variables
                    $_SESSION["beginSession"] = "ok";
                    $_SESSION['user_type'] = 'admin';
                    $_SESSION['username'] = $username;

                    // Redirect to portal folder upon successful login using JavaScript
                    echo '<script>
                              window.location.href = "/sbs/portal";
                          </script>';
                    exit();
                } else {
                    // Display error message or redirect to login page
                    echo '<script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: false,
                                    didOpen: (toast) => {
                                        toast.addEventListener("mouseenter", Swal.stopTimer);
                                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                                    }
                                });
                                
                                Toast.fire({
                                    icon: "error",
                                    title: "Invalid portalistrator credentials"
                                }).then(function () {
                                    // Code to execute after the alert is closed
                                    window.location = "login";
                                });
                            </script>';
                }
            } elseif (strpos($username, 'tr') === 0) {
                // Teacher login
                $result = LoginController::validateTeacherLogin($username, $password);
                if ($result === 'teacher') {
                    // Store user information in session variables
                    $_SESSION["beginSession"] = "ok";
                    $_SESSION['user_type'] = 'teacher';
                    $_SESSION['username'] = $username;

                    // Redirect to admin folder upon successful login using JavaScript
                    echo '<script>
                              window.location.href = "/sbs/portal";
                          </script>';
                    exit();
                } else {
                    // Display error message or redirect to login page
                    echo '<script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: false,
                                    didOpen: (toast) => {
                                        toast.addEventListener("mouseenter", Swal.stopTimer);
                                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                                    }
                                });
                                
                                Toast.fire({
                                    icon: "error",
                                    title: "Invalid teacher credentials"
                                }).then(function () {
                                    // Code to execute after the alert is closed
                                    window.location = "login";
                                });
                            </script>';
                }
            } else {
                // Invalid username format
                echo '<script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener("mouseenter", Swal.stopTimer);
                                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                                }
                            });
                            
                            Toast.fire({
                                icon: "error",
                                title: "Invalid credentials try again"
                            }).then(function () {
                                // Code to execute after the alert is closed
                                window.location = "login";
                            });
                        </script>';
            }
        } else {
            // Redirect to login page if login form is not submitted
            // You might want to handle this case appropriately
        }
    }
}
