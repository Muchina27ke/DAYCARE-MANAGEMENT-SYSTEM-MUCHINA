<?php

// Include the PHPMailer autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailModel
{
    static public function sendEmail($recipient, $subject, $message)
    {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.afripos.co.ke'; // Your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'noreply@afripos.co.ke'; // SMTP username
            $mail->Password   = 'ASBI.X=?I5G*'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('noreply@afripos.co.ke', 'Afri');
            $mail->addAddress($recipient);

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            $mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            // Failed to send email
            return false;
        }
    }
}
