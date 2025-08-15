<?php
require_once 'config.php';

// Handle CORS for cross-origin requests from Netlify
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

try {
    // Get and sanitize form data
    $first_name = sanitizeInput($_POST['first_name'] ?? '');
    $last_name = sanitizeInput($_POST['last_name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $service = sanitizeInput($_POST['service'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($service)) {
        throw new Exception('All required fields must be filled');
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Get database connection
    $pdo = getConnection();

    // Insert appointment
    $sql = "INSERT INTO appointments (first_name, last_name, email, phone, service, message) 
            VALUES (:first_name, :last_name, :email, :phone, :service, :message)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':phone' => $phone,
        ':service' => $service,
        ':message' => $message
    ]);

    echo json_encode([
        'success' => true, 
        'message' => 'Appointment request submitted successfully! We will contact you within 24 hours.',
        'appointment_id' => $pdo->lastInsertId()
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
?>