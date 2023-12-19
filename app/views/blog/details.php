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

<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5 pb-0">
        <p class="h1">Blog details</p>
        <h3><?= $blog->title ?? "" ?></h3>
        <h6 class="mb-2 text-muted"><?= $blog->author ?? "" ?></h6>
        <p><?= $blog->content ?? "" ?></p>

        <?php if (!empty($blog->publishDate) || !empty($blog->tags)) : ?>
            <h6 class="mb-3">Additional Information:</h6>
            <?php if (!empty($blog->publishDate)) : ?>
                <p><strong>Publish Date:</strong> <?= $blog->publishDate ?></p>
            <?php endif; ?>

            <?php if (!empty($blog->tags)) : ?>
                <p><strong>Tags:</strong> <?= $blog->tags ?></p>
            <?php endif; ?>
        <?php endif; ?>

        <div class="mt-3">
            <a href="/blog" class="text-decoration-none text-muted">Back to all blogs</a>
        </div>
    </div>
</div>

</body>
</html>

