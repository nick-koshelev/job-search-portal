<?php include "app/views/header.php" ?>
<div class="container shadow vh-100 p-5">
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
</div>

