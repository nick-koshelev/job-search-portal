<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeratungsHub - Kommentare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .footer {
            flex-shrink: 0;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 56px;
            }

            .footer {
                margin-top: 56px;
            }
        }

        @media (min-width: 992px) {
            body {
                padding-top: 70px;
            }

            .footer {
                margin-top: 70px;
            }
        }

        .rating-area {
            overflow: hidden;
            width: 265px;
            margin: 0 auto;
        }

        .rating-area:not(:checked) > input {
            display: none;
        }

        .rating-area:not(:checked) > label {
            float: right;
            width: 42px;
            padding: 0;
            cursor: pointer;
            font-size: 32px;
            line-height: 32px;
            color: lightgrey;
            text-shadow: 1px 1px #bbb;
        }

        .rating-area:not(:checked) > label:before {
            content: '★';
        }

        .rating-area > input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px #c60;
        }

        .rating-area > input:checked + label:hover,
        .rating-area > input:checked + label:hover ~ label,
        .rating-area > input:checked ~ label:hover,
        .rating-area > input:checked ~ label:hover ~ label,
        .rating-area > label:hover ~ input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }

        .rate-area > label:active {
            position: relative;
        }

        .comment-card {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            position: relative;
        }

        .comment-card .comment-text {
            margin-bottom: 10px;
        }

        .comment-card .comment-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment-card .delete-comment {
            color: #007bff;
            cursor: pointer;
        }

        .comment-actions button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .comment-reply-form textarea {
            width: 100%;
            margin-bottom: 10px;
        }
        .delete-comment::before {
            content: '\2713'; /* Unicode character for a check mark */
            margin-right: 5px;
            display: inline-block;
            font-size: 16px; /* Установите размер шрифта по вашему усмотрению */
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">BeratungsHub</a>
</nav>

<!-- Content -->
<div class="content container mt-5">
    <div class="card p-4">
        <form method="post" action>
            <div class="form-group">
                <label for="rating">Ihre Bewertung</label>
                <div class="rating-area">
                    <input type="radio" id="star-5" name="rating" value="5">
                    <label for="star-5" title="Bewertung «5»"></label>
                    <input type="radio" id="star-4" name="rating" value="4">
                    <label for="star-4" title="Bewertung «4»"></label>
                    <input type="radio" id="star-3" name="rating" value="3">
                    <label for="star-3" title="Bewertung «3»"></label>
                    <input type="radio" id="star-2" name="rating" value="2">
                    <label for="star-2" title="Bewertung «2»"></label>
                    <input type="radio" id="star-1" name="rating" value="1">
                    <label for="star-1" title="Bewertung «1»"></label>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Ihr Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="text">Ihr Kommentar</label>
                <textarea class="form-control" id="text" name="text"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Absenden</button>
        </form>
    </div>
</div>


<div class="mt-4">
    <h2>Letzte Kommentare</h2>
    <?php
    // Подключение к базе данных
    $conn = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.db');

    // Проверка подключения
    if (!$conn) {
        die("Fehler: " . implode(" ", $conn->errorInfo()));
    }

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

            // Добавление иконки удаления и проверка, является ли текущий пользователь автором комментария
            if (isset($_SESSION['username']) && $_SESSION['username'] === $row['name']) {
                echo "<div class='comment-actions'>";
                echo "<span class='delete-comment' data-comment-id='{$row['id']}'></span> Löschen ";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Fehler: " . implode(" ", $conn->errorInfo());
    }

    // Закрытие подключения
    $conn = null;
    ?>

</div>
<!-- Footer -->
<div class="footer bg-dark text-light py-3">
    <div class="container text-center">
        <p class="mb-0">© 2023 BeratungsHub. Alle Rechte vorbehalten.</p>
    </div>
</div>
<!-- JavaScript for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add a submit event listener to the form
        var commentForm = document.querySelector('form');
        commentForm.addEventListener('submit', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Use FormData to collect form data
            var formData = new FormData(commentForm);

            // Send an AJAX request to the server
            fetch(commentForm.action, {
                method: 'POST',
                body: formData
            })
                .then(function (response) {
                    return response.text();
                })
                .then(function (data) {
                    // Handle the response from the server
                    console.log(data);

                    // Update the comments section by reloading it
                    var commentsSection = document.querySelector('.mt-4');
                    commentsSection.innerHTML = '';
                    commentsSection.load(window.location.href + ' .mt-4');
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        });
    });
</script>
</body>

</html>
