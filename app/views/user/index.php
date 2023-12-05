<div class="container shadow min-vh-100 pb-2">

    <?php include "app/views/header.php" ?>
    <div class="p-5 pb-0">
        <p class="h1 mb-4">My account</p>
        <div class="w-50">
            <div class="row my-2 align-middle">
                <p class="col-sm-4">Username</p>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?= $user->username ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <p class="col-sm-4">First name</p>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?= $user->firstname ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <p class="col-sm-4">Surname</p>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?= $user->surname ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <p class="col-sm-4">Email</p>
                <div class="col-sm-8">
                    <input type="email" class="form-control" value="<?= $user->email ?? "" ?>" disabled>
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
            <p class="h4 mb-3">Responded vacancies</p>
            <?php foreach ($vacancies ?? [] as $key => $vacancy): ?>
                <div class="bg-light p-3 px-4 rounded-3 shadow mb-2">
                    <p class="h6"><?= $vacancy["job_title"] ?> - <?= $vacancy["company"] ?></p>
                    <p><?= $vacancy["description"] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

