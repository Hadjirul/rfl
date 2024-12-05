<?php
include '../../database/connection.php';

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$email = $_GET['email'] ?? '';
$error_message = "";
$success_message = "";
$resend_timeout = 60; // 1 minute timeout
$resend_allowed = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_otp = $_POST['otp'] ?? '';

    if (empty($input_otp)) {
        $error_message = "Please enter the OTP.";
    } else {
        $result = $conn->query("SELECT * FROM otp_verifications WHERE email='$email' AND otp='$input_otp' AND expiry_time > NOW()");
        if ($result->num_rows > 0) {
            // Insert user into `users` table
            $user = $result->fetch_assoc();
            $conn->query("INSERT INTO users (first_name, last_name, email, phone, password, updated_at)
                          VALUES ('{$user['first_name']}', '{$user['last_name']}', '$email', '{$user['phone']}', '{$user['password']}', NOW())");

            // Remove OTP record
            $conn->query("DELETE FROM otp_verifications WHERE email='$email'");
            $success_message = "Your account has been verified. You can now login.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <form method="POST" action="">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
