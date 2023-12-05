<?php
try {
    // Подключение к базе данных SQLite
    $pdo = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '\database\database.db');

    // Выполнение SQL-запроса для получения всех вакансий
    $stmt = $pdo->query('SELECT * FROM vacancies');
    $vacancies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Закрытие соединения с базой данных
    $pdo = null;

    // Возвращаем данные в формате JSON
    echo json_encode($vacancies);
} catch (PDOException $e) {
    // Логирование ошибки
    error_log('PDO Exception: ' . $e->getMessage());

    // Возвращаем сообщение об ошибке в формате JSON
    echo json_encode(['error' => 'An error occurred while fetching vacancies. Please try again.']);
}
?>
