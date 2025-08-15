<?php
// Database configuration - UPDATE THESE WITH YOUR PLANETSCALE DETAILS
define('DB_HOST', 'aws.connect.psdb.cloud');
define('DB_USER', 'YOUR_PLANETSCALE_USERNAME');
define('DB_PASS', 'YOUR_PLANETSCALE_PASSWORD');
define('DB_NAME', 'dental-appointments');

// Create database connection
function getConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";sslmode=require", DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>