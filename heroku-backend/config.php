<?php
// Database configuration for Heroku
$url = parse_url(getenv("CLEARDB_DATABASE_URL") ?: "mysql://root:@localhost/dental_appointments");

define('DB_HOST', $url['host'] ?? 'localhost');
define('DB_USER', $url['user'] ?? 'root');
define('DB_PASS', $url['pass'] ?? '');
define('DB_NAME', substr($url['path'], 1) ?? 'dental_appointments');

// Create database connection
function getConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
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