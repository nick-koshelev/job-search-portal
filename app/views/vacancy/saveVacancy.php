<?php
// Подключение к базе данных SQLite
$pdo = new PDO('sqlite:E:\IU\test\job-search-portal\database\database.db');

// Получение данных из формы
$jobTitle = isset($_POST['job_title']) ? $_POST['job_title'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$jobType = isset($_POST['job_type']) ? $_POST['job_type'] : '';
$salary = isset($_POST['salary']) ? $_POST['salary'] : '';

// Проверка наличия значения job_title
if (empty($jobTitle)) {
    echo json_encode(['status' => 'error', 'message' => 'Job title is required']);
    exit;
}

// Подготовка SQL-запроса
$sql = "INSERT INTO vacancies (job_title, company, location, description, job_type, salary) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Выполнение запроса с передачей данных
$stmt->execute([$jobTitle, $company, $location, $description, $jobType, $salary]);

// Закрытие соединения с базой данных
$pdo = null;

// Отправка данных в формате JSON
echo json_encode(['status' => 'success']);
?>
