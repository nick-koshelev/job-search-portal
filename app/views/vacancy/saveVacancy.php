<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Ramsey\Uuid\Uuid;

// Подключение к базе данных SQLite
$pdo = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '\database\database.db');

// Получение данных из формы
$jobTitle = isset($_POST['job_title']) ? $_POST['job_title'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$jobType = isset($_POST['job_type']) ? $_POST['job_type'] : '';
$salary = isset($_POST['salary']) ? $_POST['salary'] : '';

if (empty($jobTitle)) {
    echo json_encode(['status' => 'error', 'message' => 'Job title is required']);
    exit;
}

// Подготовка SQL-запроса
$id = Uuid::uuid4()->toString();
$sql = "INSERT INTO vacancies (id, job_title, company, location, description, job_type, salary) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Выполнение запроса с передачей данных
$stmt->execute([$id, $jobTitle, $company, $location, $description, $jobType, $salary]);

// Закрытие соединения с базой данных
$pdo = null;

// Отправка данных в формате JSON
echo json_encode(['status' => 'success']);
?>
