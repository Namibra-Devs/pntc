<?php

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';
require_once('./TCPDF/tcpdf.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['html'])) {
        $htmlContent = $_POST['html'];

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHTML($htmlContent, true, false, true, false, '');
        $pdfOutput = $pdf->Output('application_form.pdf', 'S');

        // Email configuration
        $mail = new PHPMailer();
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.pntc.edu.gh';
            $mail->SMTPAuth = true;
            $mail->Username = 'admission@pntc.edu.gh';
            $mail->Password = 'zxzxzvzhgsyeye76567387';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // TLS port

            // Recipients
            $mail->setFrom('admission@pntc.edu.gh', 'PNTC Admissions');
            $mail->addAddress('abdulsamadbalogun25@gmail.com', 'Applicant');

            // Attachments
            $mail->addStringAttachment($pdfOutput, 'application_form.pdf');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Admission Application Successful';
            $mail->Body    = 'Dear Applicant,<br><br>Congratulations! Your admission application has been successfully submitted.<br><br>Please find attached your application form for your reference.<br><br>Best regards,<br>The Admission Team';
            $mail->AltBody = 'Dear Applicant,\n\nCongratulations! Your admission application has been successfully submitted.\n\nPlease find attached your application form for your reference.\n\nBest regards,\nThe Admission Team';

            $mail->send();
            echo 'Email has been sent successfully!';
        } catch (Exception $e) {
            echo "Email sending failed: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No HTML content received';
    }
} else {
    echo 'Invalid request method';
}
