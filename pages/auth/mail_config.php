<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



function sendMail($recipientEmail, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Replace with your email
        $mail->Password = 'your_password'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your_email@example.com', 'Your App Name'); // Replace with sender email
        $mail->addAddress($recipientEmail);

        $mail->isHTML(true);
        $mail->Subject = 'OTP Verification Code';
        $mail->Body    = "Your OTP verification code is <b>$otp</b>. Please use this to complete your registration.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
