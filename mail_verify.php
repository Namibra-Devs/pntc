<?php
session_start();
include 'db_connect.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $query = "SELECT email, serial, pin, token_expiry, is_verified FROM email_verification WHERE token = '$token'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $serial = $row['serial'];
        $pin = $row['pin'];
        $token_expiry = $row['token_expiry'];
        $is_verified = $row['is_verified'];

        if (new DateTime() > new DateTime($token_expiry)) {
            // Token has expired
            $_SESSION['verify_status'] = 'Failed to verify email.';
            header('Location: verify_email.php');
            exit();
        } elseif ($is_verified) {
            // Email already verified
            setcookie('email', $email, time() + 86400 * 30, '/'); // Set cookie for 30 days
            header('Location: index.php');
            exit();
        } else {
            // Mark the email as verified
            $update_query = "UPDATE email_verification SET is_verified = 1 WHERE token = '$token'";
            if (mysqli_query($db, $update_query)) {
                // Set cookie and redirect to biodata page
                setcookie('email', $email, time() + 86400 * 30, '/'); // Set cookie for 30 days
                header('Location: index.php');
                exit();
            } else {
                // Failed to update the verification status
                $_SESSION['verify_status'] = 'Failed to verify email.';
                header('Location: verify_email.php');
                exit();
            }
        }
    } else {
        // Invalid token
        $_SESSION['verify_status'] = 'Failed to verify email.';
        header('Location: verify_email.php');
        exit();
    }
} else {
    // No token provided
    $_SESSION['verify_status'] = 'Failed to verify email.';
    header('Location: verify_email.php');
    exit();
}
?>
