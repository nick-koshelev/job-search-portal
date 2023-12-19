<?php
// Подключение к базе данных
$conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Проверка подключения
if (!$conn) {
    die("Fehler: " . implode(" ", $conn->errorInfo()));
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, существует ли параметр "rating" в массиве $_POST
    $rating = isset($_POST["rating"]) ? intval($_POST["rating"]) : 0;

    // Если рейтинг равен 0, это может быть пустым или недопустимым значением
    if ($rating === 0) {
        echo "Fehler: Ungültige Bewertung.";
    } else {
        // Защита от SQL-инъекций
        $name = htmlspecialchars($_POST["name"]);
        $text = htmlspecialchars($_POST["text"]);

        // Подготовка и выполнение SQL-запроса
        $stmt = $conn->prepare("INSERT INTO comments (name, rating, text) VALUES (:name, :rating, :text)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':text', $text);

        if ($stmt->execute()) {
            echo "Kommentar wurde hinzugefügt.";
        } else {
            echo "Fehler: " . implode(" ", $stmt->errorInfo());
        }
    }
}

// Закрытие подключения
$conn = null;
?>
