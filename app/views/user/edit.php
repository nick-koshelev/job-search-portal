<?php

$imageSrc = isset($user) ? "data:" . $user->getImageType() . ";base64," . $user->image : "";

?>

<div class="container shadow min-vh-100">
    <div class="p-5">
        <p class="h1 mb-3">Edit</p>
        <?php
        if (isset($errorMessage) && $errorMessage !== '') {
            echo "<div class=\"alert alert-danger text-start\" role=\"alert\">$errorMessage</div>";
        }
        ?>
        <form class="w-50" action="/user/edit?id=<?php echo $user->id ?? '' ?>" method="post"
              enctype="multipart/form-data">
            <div>
                <?php if (!empty($imageSrc)) :?>
                    <img class="img-fluid rounded-circle shadow" src="<?= $imageSrc ?>" alt="Image" style="max-width: 200px">
                <?php endif; ?>
            </div>
            <div class="form-group row my-2">
                <label for="image" class="col-sm-4 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="username" class="col-sm-4 col-form-label">Username <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username"
                           value="<?= $user->username ?? '' ?>" pattern="[^' ']+">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="firstname" class="col-sm-4 col-form-label">Firstname</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="<?= $user->firstname ?? '' ?>">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="surname" class="col-sm-4 col-form-label">Surname</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="surname" name="surname"
                           value="<?= $user->surname ?? '' ?>">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?? '' ?>">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="password" class="col-sm-4 col-form-label">Password <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="repeatPassword" class="col-sm-4 col-form-label">Repeat password <span
                            class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a class="btn btn-danger px-3 float-end ms-2" href="/user">Cancel</a>
                    <button class="btn btn-dark px-3 float-end ms-2" type="submit">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>