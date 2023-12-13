<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5 pb-0">
        <p class="h1">Company details</p>
        <h3><?= $company->name ?? "" ?></h3>
        <h6 class="mb-2 text-muted"><?= $company->industry ?? "" ?></h6>
        <p><?= $company->description ?? "" ?></p>

        <?php if (!empty($company->contactEmail) || !empty($company->contactPhone) || !empty($company->location) || !empty($company->website))  : ?>
            <h6 class="mb-3">Contact information:</h6>
            <?php if (!empty($company->contactEmail)) : ?>
                <div class="row w-25">
                    <div class="col-6 col-lg-2 offset-1">
                        <p class="text-center"><i class="fas fa-envelope text-blue"></i></p>
                    </div>
                    <div class="col-2">
                        <p><?= $company->contactEmail ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($company->contactPhone)) : ?>
                <div class="row w-25">
                    <div class="col-6 col-lg-2 offset-1">
                        <p class="text-center"><i class="fas fa-phone text-blue"></i></p>
                    </div>
                    <div class="col-2">
                        <p><?= $company->contactPhone ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($company->location)) : ?>
                <div class="row w-25">
                    <div class="col-6 col-lg-2 offset-1">
                        <p class="text-center"><i class="fas fa-map-marker-alt text-blue"></i></p>
                    </div>
                    <div class="col-2">
                        <p><?= $company->location ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($company->website)) : ?>
                <div class="row w-25 mb-3">
                    <div class="col-6 col-lg-2 offset-1">
                        <p class="text-center"><i class="fas fa-solid fa-globe text-blue"></i></p>
                    </div>
                    <div class="col-2">
                        <?php if (strpos($company->website, "http://") !== false || strpos($company->website, "https://") !== false) : ?>
                            <a class="text-decoration-none text-muted"
                               href="<?= $company->website ?>"><?= $company->website ?></a>
                        <?php else: ?>
                            <p><?= $company->website ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="d-flex">
            <?php if (isset($company) && isset($userId) && $company->creatorUserId == $userId) : ?>
                <a class="btn btn-dark mb-2 me-2" href="/company/edit?id=<?= $company->id ?>">Edit</a>
                <form class="mb-2 me-2" action="/company/delete?id=<?= $company->id ?>" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            <?php endif; ?>
        </div>

        <div class="mt-3">
            <a href="/company" class="text-decoration-none text-muted">To all companies</a>
        </div>
    </div>
</div>