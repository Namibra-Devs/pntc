<?php
session_start();
include('db_connect.php');
$pin = $_COOKIE['pin'];
$serial = $_COOKIE['serial'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['user_email'];
    $token = bin2hex(random_bytes(16));
    $expiry = date("Y-m-d H:i:s", strtotime('+30 minutes'));

    $query = "INSERT INTO email_verification (email, serial, pin, token, token_expiry, is_verified) VALUES ('$email', '$serial', '$pin', '$token', '$expiry', 0)";
    if (mysqli_query($db, $query)) {

        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.pntc.edu.gh';
            $mail->SMTPAuth = true;
            $mail->Username = 'admission@pntc.edu.gh';
            $mail->Password = 'zxzxzvzhgsyeye76567387';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('noreply@pntc.edu.gh', 'PNTC Admissions');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body    = "Please click the link below to verify your email address:<br><br>";
            $mail->Body   .= "<a href='https://admission.pntc.edu.gh/mail_verify.php?token=$token'>Verify Email</a>";
            $mail->AltBody = "Please click the link below to verify your email address:\n\n";
            $mail->AltBody .= "https://admission.pntc.edu.gh/mail_verify.php?token=$token";

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Failed to send verification email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to store email verification data.";
    }
}
