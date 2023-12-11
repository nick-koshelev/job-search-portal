<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Test" ?></title>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php

ob_start();
include($viewPath ?? "app/views/404.php");
$content = ob_get_clean();

?>

<div class="d-flex flex-column min-vh-100">
    <div>
        <?php
        if (isset($showHeader) && $showHeader)
            include "app/views/header.php";
        ?>
    </div>
    <div <?= (isset($showHeader) && $showHeader) || (isset($showFooter) && $showFooter) ? "class=\"flex-grow-1 d-flex flex-column\"" : "" ?>>
        <?= $content ?>
    </div>
    <div class="">
        <?php
        if (isset($showFooter) && $showFooter)
            include "app/views/footer.php"
        ?>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/032814e33f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</html>