<?php
// Подключение к базе данных
$conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Проверка подключения
if (!$conn) {
    die("Fehler: " . implode(" ", $conn->errorInfo()));
}

// Запрос к базе данных
$sql = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

// Вывод комментариев
if ($result !== false) {
    foreach ($result as $row) {
        echo "<div class='card mb-3 comment-card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($row["name"]) . "</h5>";
        echo "<p class='card-text'>Bewertung: " . htmlspecialchars($row["rating"]) . "</p>";
        echo "<p class='card-text comment-text'>" . htmlspecialchars($row["text"]) . "</p>";

        // Добавление кнопки удаления, видимой только для владельца комментария
        if (isCurrentUserOwner($row["user_id"])) {
            echo "<p class='delete-comment' onclick='deleteComment(" . $row["id"] . ")'>Удалить</p>";
        }

        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Fehler: " . implode(" ", $conn->errorInfo());
}

// Закрытие подключения
$conn = null;

// Замените эту функцию на ваш механизм аутентификации
function isCurrentUserOwner($commentUserId) {
    // Верните true, если текущий пользователь является владельцем комментария, иначе false
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] == $commentUserId;
}
?>
