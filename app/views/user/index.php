<?php

$imageSrc = isset($user) ? "data:" . $user->getImageType() . ";base64," . $user->image : "";
$decodedImage = isset($user->image) ? base64_encode($user->image) : "";

?>

<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5 pb-0">
        <p class="h1 mb-4">My account</p>
        <div class="mb-4">
            <?php if (!empty($imageSrc)) :?>
                <img class="img-fluid rounded-circle shadow" src="<?= $imageSrc ?>" alt="Image" style="max-width: 200px">
            <?php endif; ?>
        </div>
        <div class="w-50">
            <div class="row my-2 align-middle">
                <label for="username" class="col-sm-4">Username</label>
                <div class="col-sm-8">
                    <input id="username" type="text" class="form-control" value="<?= $user->username ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="firstname" class="col-sm-4">First name</label>
                <div class="col-sm-8">
                    <input id="firstname" type="text" class="form-control" value="<?= $user->firstname ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="surname" class="col-sm-4">Surname</label>
                <div class="col-sm-8">
                    <input id="surname" type="text" class="form-control" value="<?= $user->surname ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="email" class="col-sm-4">Email</label>
                <div class="col-sm-8">
                    <input id="email" type="email" class="form-control" value="<?= $user->email ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2 mt-4">
                <p class="col-sm-4"></p>
                <div class="col-sm-8">
                    <a class="btn btn-dark px-3 float-end" <?php echo isset($user) ? "href=\"/user/edit?id=" . $user->id . "\"" : "" ?>>Edit</a>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <?php if (!empty($vacancies)) : ?>
                <p class="h4 mb-3">Responded vacancies</p>
                <?php foreach ($vacancies as $key => $vacancy): ?>
                    <div class="bg-light p-3 px-4 rounded-3 shadow mb-2">
                        <p class="h6"><?= $vacancy["job_title"] ?> - <?= $vacancy["company"] ?></p>
                        <p><?= $vacancy["description"] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="h4 mb-3">No responded vacancies yet</p>
            <?php endif ?>
        </div>
    </div>
</div>

