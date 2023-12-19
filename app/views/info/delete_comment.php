<?php
// Подключение к базе данных
$conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

// Проверка подключения
if (!$conn) {
    die("Fehler: " . implode(" ", $conn->errorInfo()));
}

// Получение данных из запроса
$commentId = $_POST['commentId'];

// Получение информации о текущем пользователе (замените на ваш механизм аутентификации)
$currentUserId = getCurrentUserId(); // Замените на вашу реальную реализацию

// Получение информации о владельце комментария
$sqlCheckOwnership = "SELECT user_id FROM comments WHERE id = :commentId";
$stmtCheckOwnership = $conn->prepare($sqlCheckOwnership);
$stmtCheckOwnership->bindParam(':commentId', $commentId, PDO::PARAM_INT);
$stmtCheckOwnership->execute();
$row = $stmtCheckOwnership->fetch(PDO::FETCH_ASSOC);

if ($row && isCurrentUserOwner($row["user_id"])) {
    // Удаление комментария
    $sqlDelete = "DELETE FROM comments WHERE id = :commentId";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bindParam(':commentId', $commentId, PDO::PARAM_INT);
    $stmtDelete->execute();
    echo "Комментарий успешно удален";
} else {
    echo "Ошибка: Вы не являетесь владельцем комментария";
}

// Закрытие подключения
$conn = null;

// Замените эту функцию на ваш механизм аутентификации
function getCurrentUserId() {
    // Верните идентификатор текущего пользователя или null, если не аутентифицирован
    // Пример: return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    return null; // Замените на вашу реальную реализацию
}
?>
