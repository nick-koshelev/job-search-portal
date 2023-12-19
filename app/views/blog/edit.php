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
    <div class="p-5">
        <p class="h1 mb-4">Edit Blog</p>
        <div class="pt-2">
            <form class="ms-2" action="/blog/edit?id=<?= $blog->id ?? "" ?>" method="post">
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="title" name="title" required value="<?= $blog->title ?? "" ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="content" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-3">
                        <textarea class="form-control" id="content" name="content"><?= $blog->content ?? "" ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="author" name="author" value="<?= $blog->author ?? "" ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="publish_date" class="col-sm-2 col-form-label">Publish Date</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="publish_date" name="publish_date" value="<?= $blog->publish_date ?? "" ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="tags" name="tags" value="<?= $blog->tags ?? "" ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-3 offset-sm-2">
                        <div class="float-end">
                            <a href="/blog" class="btn btn-danger ms-2">Cancel</a>
                            <button type="submit" class="btn btn-dark ms-2">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
