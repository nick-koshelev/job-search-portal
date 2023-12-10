<?php
try {
    $search = $_GET["search"] ?? "";
    $filter = $_GET["filter"] ?? "";

    // Подключение к базе данных SQLite
    $pdo = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

    // Выполнение SQL-запроса для получения всех вакансий
    $query = 'SELECT * FROM vacancies WHERE true';

    if(!empty($search))
        $query .= " AND job_title like '%$search%'";

    if (!empty($filter))
        $query .= " AND job_type like '$filter'";

    $stmt = $pdo->query($query);
    $vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Закрытие соединения с базой данных
    $pdo = null;

    // Возвращаем данные в формате JSONsehen
    //(видеть, смотреть)
    echo json_encode($vacancies);
} catch (PDOException $e) {
    // Логирование ошибки
    error_log('PDO Exception: ' . $e->getMessage());

    // Возвращаем сообщение об ошибке в формате JSON
    echo json_encode(['error' => 'An error occurred while fetching vacancies. Please try again.']);
}
?>
