<?php

if (isset($user) && !empty($user->image))
    $imageSrc = "data:" . $user->getImageType() . ";base64," . $user->image;

?>

<style>
    .accordion-button:not(.collapsed)::after,
    .accordion-button::after {
        background-image: unset !important;
    }
</style>

<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5 pb-0">
        <p class="h1 mb-4">My account</p>
        <?php if (!empty($imageSrc)) : ?>
            <div class="mb-4">
                <img class="img-fluid rounded-circle shadow" src="<?= $imageSrc ?>" alt="Image"
                     style="max-width: 200px">
            </div>
        <?php endif; ?>
        <div>
            <div class="row my-2 align-middle">
                <label for="username" class="col-sm-4 col-lg-2">Username</label>
                <div class="col-sm-8 col-lg-3">
                    <input id="username" type="text" class="form-control" value="<?= $user->username ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="firstname" class="col-sm-4 col-lg-2">First name</label>
                <div class="col-sm-8 col-lg-3">
                    <input id="firstname" type="text" class="form-control" value="<?= $user->firstname ?? "" ?>"
                           disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="surname" class="col-sm-4 col-lg-2">Surname</label>
                <div class="col-sm-8 col-lg-3">
                    <input id="surname" type="text" class="form-control" value="<?= $user->surname ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2">
                <label for="email" class="col-sm-4 col-lg-2">Email</label>
                <div class="col-sm-8 col-lg-3">
                    <input id="email" type="email" class="form-control" value="<?= $user->email ?? "" ?>" disabled>
                </div>
            </div>
            <div class="row my-2 mt-4">
                <p class="col-sm-4 col-lg-2"></p>
                <div class="col-sm-8 col-lg-3">
                    <a class="btn btn-dark px-3 float-end" <?php echo isset($user) ? "href=\"/user/edit?id=" . $user->id . "\"" : "" ?>>Edit</a>
                </div>
            </div>
        </div>
        <div class="accordion accordion-flush mt-5" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="responded-vacancies-heading">
                    <button class="accordion-button collapsed shadow-none bg-light" type="button"
                            data-bs-toggle="collapse" data-bs-target="#responded-vacancies" aria-expanded="false"
                            aria-controls="responded-vacancies">
                        Responded vacancies
                    </button>
                </h2>
                <div id="responded-vacancies" class="accordion-collapse collapse"
                     aria-labelledby="responded-vacancies-heading" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <?php if (!empty($vacancies)) : ?>
                            <?php foreach ($vacancies as $key => $vacancy): ?>
                                <div class="bg-light p-3 px-4 rounded-3 shadow mb-3">
                                    <p class="h6"><?= $vacancy["job_title"] ?> - <?= $vacancy["company"] ?></p>
                                    <p><?= $vacancy["description"] ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            No responded vacancies yet
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="created-vacancies-heading">
                    <button class="accordion-button collapsed shadow-none bg-light" type="button"
                            data-bs-toggle="collapse" data-bs-target="#created-vacancies" aria-expanded="false"
                            aria-controls="created-vacancies">
                        My vacancies
                    </button>
                </h2>
                <div id="created-vacancies" class="accordion-collapse collapse"
                     aria-labelledby="created-vacancies-heading" data-bs-parent="#accordion">
                    <div class="accordion-body">Here will be your created vacancies</div>
                </div>
            </div>
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="created-companies-heading">
                    <button class="accordion-button collapsed shadow-none bg-light" type="button"
                            data-bs-toggle="collapse" data-bs-target="#created-companies" aria-expanded="false"
                            aria-controls="created-companies">
                        My companies
                    </button>
                </h2>
                <div id="created-companies" class="accordion-collapse collapse"
                     aria-labelledby="created-companies-heading" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <a href="/company/create" class="btn btn-success mb-4">Create company</a>
                        <?php if (!empty($companies)) : ?>
                            <?php foreach ($companies as $key => $company): ?>
                                <?php
                                $maxLength = 300;
                                if (strlen($company->description) > $maxLength) {
                                    $company->description = substr($company->description, 0, $maxLength) . "...";
                                }
                                ?>
                                <div class="card border-0 bg-light rounded-3 shadow mb-3">
                                    <div class="card-body">
                                        <div class="card-title mt-0 row">
                                            <h5 class="col-11"><?= $company->name ?></h5>
                                            <form class="col-1" action="/company/delete?id=<?= $company->id ?>" method="post">
                                                <button class="float-end border-0 bg-transparent" type="submit">
                                                    <i class="fa-solid fa-xmark text-danger"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-title="Delete company"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $company->industry ?></h6>
                                        <p class="card-text"><?= $company->description ?></p>
                                        <div class="text-end">
                                            <a href="/company/details?id=<?= $company->id ?>"
                                               class="btn btn-dark">Details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No created companies yet</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

