<?php
// Подключение к базе данных
$conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Проверка подключения
if (!$conn) {
    die("Fehler: " . implode(" ", $conn->errorInfo()));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Защита от SQL-инъекций
    $commentId = intval($_POST["commentId"]);

    // Проверка, является ли текущий пользователь автором комментария
    session_start();
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Проверка, является ли пользователь автором комментария
        $stmt = $conn->prepare("SELECT user_id FROM comments WHERE id = :commentId");
        $stmt->bindParam(':commentId', $commentId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && $result['user_id'] === $userId) {
            // Удаление комментария
            $stmt = $conn->prepare("DELETE FROM comments WHERE id = :commentId");
            $stmt->bindParam(':commentId', $commentId);

            if ($stmt->execute()) {
                echo "Kommentar wurde gelöscht.";
            } else {
                echo "Fehler beim Löschen des Kommentars: " . implode(" ", $stmt->errorInfo());
            }
        } else {
            echo "Sie sind nicht berechtigt, diesen Kommentar zu löschen.";
        }
    } else {
        echo "Benutzer nicht angemeldet.";
    }
}

// Закрытие подключения
$conn = null;
?>
