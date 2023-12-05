<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Ramsey\Uuid\Uuid;

// Connect to the SQLite database
$pdo = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Get data from the form
$name = isset($_POST['name']) ? $_POST['name'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$industry = isset($_POST['industry']) ? $_POST['industry'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$website = isset($_POST['website']) ? $_POST['website'] : '';
$contactEmail = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
$contactPhone = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : '';

if (empty($name)) {
    echo json_encode(['status' => 'error', 'message' => 'Company name is required']);
    exit;
}

// Prepare SQL statement
$id = Uuid::uuid4()->toString();
$sql = "INSERT INTO companies (id, name, description, industry, location, website, contact_email, contact_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Execute the query with data
$stmt->execute([$id, $name, $description, $industry, $location, $website, $contactEmail, $contactPhone]);

// Close the database connection
$pdo = null;

// Send data in JSON format
echo json_encode(['status' => 'success']);
?>
