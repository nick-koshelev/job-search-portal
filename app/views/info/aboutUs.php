<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeratungsHub - Kommentare</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .delete-comment {
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>

<body>

<!-- Content -->
<div class="content container mt-5">
    <div class="card p-4">
        <form id="commentForm" method="post" action="add_comment.php">
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
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="text">Ihr Kommentar</label>
                <textarea class="form-control" id="text" name="text" required></textarea>
            </div>

            <button type="button" class="btn btn-primary" onclick="submitForm()">Absenden</button>
        </form>
    </div>

    <div class="mt-4" id="commentSection">
        <h2>Letzte Kommentare</h2>
        <?php include 'load_comments.php'; ?>
    </div>
</div>

<!-- JavaScript for Bootstrap and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
    function submitForm() {
        var formData = new FormData(document.getElementById('commentForm'));

        fetch('add_comment.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);

                document.getElementById('commentForm').reset();
                loadComments();
            })
            .catch(error => console.error('Error:', error));
    }

    function loadComments() {
        fetch('load_comments.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('commentSection').innerHTML = '<h2>Letzte Kommentare</h2>' + data;
            })
            .catch(error => console.error('Error:', error));
    }

    function deleteComment(commentId) {
        fetch('delete_comment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'commentId=' + commentId,
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                loadComments();
            })
            .catch(error => console.error('Error:', error));
    }

    window.addEventListener('DOMContentLoaded', loadComments);
</script>

</body>

</html>
