<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'DatabaseHelper.php'; // Замените на путь к вашему классу DatabaseHelper

    // Получаем данные из формы
    $jobTitle = $_POST['job_title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];

    // Создаем экземпляр DatabaseHelper
    $dbHelper = new DatabaseHelper();
    $dbHelper->open();

    // Добавляем вакансию в базу данных
    $dbHelper->insert('vacancies', [
        'job_title' => $jobTitle,
        'company' => $company,
        'location' => $location,
        'description' => $description,
        'salary' => $salary,
    ]);

    // Закрываем соединение с базой данных
    $dbHelper->close();

    // Перенаправляем пользователя на страницу отображения вакансий
    header("Location: display_vacancies.php");
    exit();
}
?>