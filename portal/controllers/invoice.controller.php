<?php
class invoiceController
{
    /*=============================================
	SHOW Tutors
	=============================================*/

    static public function ctrShowInvoice($item, $value)
    {

        $table = "invoice";

        $answer = invoiceModel::mdlShowInvoice($table, $item, $value);

        return $answer;
    }
    static public function ctrCreateInvoice()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $classid = $_POST['group'];
            $title = $_POST['invoiceTitle'];
            $desc = $_POST['invoiceDescription'];

            // Retrieve class information
            $class = classModel::mdlShowClass('class', 'class_id', $classid);
            $class_id = $class[0]['class_id'];
            $fee = $class[0]['fee'];

            // Retrieve kids/students enrolled in the class
            $kids = kidModel::mdlShowKid('student', 'class_id', $class_id);
            if ($kids) {
                // Iterate through each kid/student
                foreach ($kids as $kid) {
                    $result = invoiceModel::mdlAddInvoice($kid['student_id'], $title, $desc, $fee, $fee, 'unpaid');
                    if ($result === 'ok') {
                        // Success alert
                        echo '<script>
                 Swal.fire({
                     icon: "success",
                     title: "Success!",
                     text: "Invoices Created successfully!",
                 }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = "invoices";
                     }
                 });
             </script>';
                    } else {
                        // Error alert
                        echo '<script>
                         Swal.fire({
                             icon: "error",
                             title: "Oops...",
                             text: "Failed create the groups. Please try again later!",
                         });
                     </script>';
                    }
                }
            } else {
                echo '<script>
                         Swal.fire({
                             icon: "error",
                             title: "Oops...",
                             text: "There are no kids in that group",
                         });
                     </script>';
            }
        }
    }
}
