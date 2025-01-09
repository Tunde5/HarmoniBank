<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Database connection
// $host = 'localhost';
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'test';

$port = 3306; // Replace if using a custom MySQL port


// Establish connection
try {
    $conn = new mysqli($host, $username, $password, $database, 3306);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    
    echo "Connected successfully!";

} catch (Exception $e) {
    // Handle exceptions
    echo "Error: " . $e->getMessage();
} finally {
    // Close the connection
    if (isset($conn) && $conn->connect_error === null) {
        $conn->close();
    }
}
?>
