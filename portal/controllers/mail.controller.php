<?php
class EmailController
{
    static public function sendEmail($recipient, $subject, $message)
    {
        // Check if recipient, subject, and message are not empty
        if (!empty($recipient) && !empty($subject) && !empty($message)) {
            // Send email using EmailModel
            if (EmailModel::sendEmail($recipient, $subject, $message)) {
                // Email sent successfully
                echo json_encode(array("success" => true, "message" => "Email sent successfully"));
            } else {
                // Failed to send email
                echo json_encode(array("success" => false, "message" => "Failed to send email"));
            }
        } else {
            // Invalid parameters
            echo json_encode(array("success" => false, "message" => "Invalid parameters"));
        }
    }
}