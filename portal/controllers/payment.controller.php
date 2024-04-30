<?php
class paymentController
{
    /*=============================================
	SHOW PAYMENT
	=============================================*/

    static public function ctrShowPayment($item, $value)
    {

        $table = "payment";

        $answer = parentModel::mdlShowParent($table, $item, $value);

        return $answer;
    }

    static public function addPayment()
    {
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $title = $_POST['title'];
            $paymentType = $_POST['payment_type'];
            $invoiceId = $_POST['invoice_id'];
            $studentId = $_POST['student_id'];
            $method = $_POST['method'];
            $description = $_POST['description'];
            $amount = $_POST['amount'];

            // Prepare data array
            $data = array(
                'title' => $title,
                'payment_type' => $paymentType,
                'invoice_id' => $invoiceId,
                'student_id' => $studentId,
                'method' => $method,
                'description' => $description,
                'amount' => $amount
            );

            // Call the model method to add the payment
            $response = PaymentModel::addPayment($data);

            // Check the response from the model
            if ($response === 'ok') {

                // Now, update the invoice directly
                try {
                    $connection = connection::connect();
                    $updateQuery = "UPDATE invoice SET status = 'paid', due=0, amount_paid=$amount WHERE invoice_id = :invoiceId";
                    $stmt = $connection->prepare($updateQuery);
                    $stmt->bindParam(':invoiceId', $invoiceId);
                    $stmt->execute();
                    // Invoice updated successfully
                    echo '<script>
                        console.log("Invoice updated successfully!");
                      </script>';
                } catch (PDOException $e) {
                    // Failed to update invoice
                    echo '<script>
                        console.error("Failed to update invoice: ' . $e->getMessage() . '");
                      </script>';
                }
                // Provide success message to the user
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Payment added successfully!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function(){
                        window.location.href = "invoices";
                    });
                  </script>';
            } else {
                // Provide error message to the user
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "An error occurred while adding the payment. Please try again later.",
                        showConfirmButton: false,
                        timer: 1500
                    });
                  </script>';
            }
        }
    }
}
