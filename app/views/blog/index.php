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
        <p class="h1 mb-4">Blogs</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 my-2">

            <?php foreach ($blogs ?? [] as $key => $blog) : ?>


                <?php
                $maxLength = 200;
                if (strlen($blog->content) > $maxLength) {
                    $blog->content = substr($blog->content, 0, $maxLength) . "...";
                }
                ?>

                <div class="col">
                    <div class="card border-0 bg-light rounded-3 shadow">
                        <div class="card-body">
                            <h5 class="card-title mt-2">
                                <span><?= $blog->title ?></span>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $blog->author ?></h6>
                            <p class="card-text" style="min-height: 155px"><?= $blog->content ?></p>
                            <a href="/blog/details?id=<?= $blog->id ?>" class="btn btn-dark float-end">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>

