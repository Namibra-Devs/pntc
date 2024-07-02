<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("db_connect.php");

if (isset($_GET['ids'])) {
    $id = $_GET['ids'];
    $query = "SELECT Name, Type, Size FROM Files WHERE id='2'";
    
    $result = mysqli_query($db, $query) or die('Error, query failed');
    
    // if ($result && mysqli_num_rows($result) > 0) {
        list($name, $type, $size) = mysqli_fetch_array($result);
        
        $path = 'guide/' . $name;
        // echo $type;
        // exit;
        
        if (file_exists($path)) {
            // Set headers for file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Content-Length: " . $size);
            header('Content-Type: application/vnd.ms-excel');
            // header("Content-Type: " . $type);
            header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            
            readfile($path); // Output the file content
            exit; // Terminate the script after download
        } else {
            echo 'File not found';
        }
    // } else {
    //     echo 'No file found for the given ID';
    // }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>After Download</title>
</head>
<body>
    <h1>Other Content Here</h1>
    <p>This content will be displayed after the file download.</p>
</body>
</html>
