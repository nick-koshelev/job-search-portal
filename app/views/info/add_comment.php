<?php
// Подключение к базе данных
$conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Проверка подключения
if (!$conn) {
    $errorInfo = $conn->errorInfo();
    die("Fehler: " . $errorInfo[2]);
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Защита от SQL-инъекций
    $name = htmlspecialchars($_POST["name"]);
    $rating = intval($_POST["rating"]);
    $text = htmlspecialchars($_POST["text"]);

    // Подготовка и выполнение SQL-запроса
    $stmt = $conn->prepare("INSERT INTO comments (name, rating, text) VALUES (:name, :rating, :text)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':text', $text);

    if ($stmt->execute()) {
        echo "Kommentar erfolgreich hinzugefügt.";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Fehler beim Hinzufügen des Kommentars: " . $errorInfo[2];
    }
}

// Запрос к базе данных
$sql = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

// Вывод комментариев
if ($result !== false) {
    foreach ($result as $row) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($row["name"]) . "</h5>";
        echo "<p class='card-text'>Bewertung: " . htmlspecialchars($row["rating"]) . "</p>";
        echo "<p class='card-text'>" . htmlspecialchars($row["text"]) . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    $errorInfo = $conn->errorInfo();
    echo "Fehler beim Abrufen der Kommentare: " . $errorInfo[2];
}

// Закрытие подключения
$conn = null;
?>
