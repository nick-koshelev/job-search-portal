<div class="container shadow pb-2 h-100 flex-grow-1">
    <div class="p-5 pb-0">
        <p class="h1 mb-4">Companies</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 my-2">
            <?php foreach ($companies ?? [] as $key => $company) : ?>
                <?php
                $maxLength = 200;
                if (strlen($company->description) > $maxLength) {
                    $company->description = substr($company->description, 0, $maxLength) . "...";
                }
                ?>

                <div class="col">
                    <div class="card border-0 bg-light rounded-3 shadow">
                        <div class="card-body">
                            <h5 class="card-title mt-2">
                                <span><?= $company->name ?></span>
                                <?php if (isset($userId) && $company->creatorUserId == $userId) : ?>
                                    <span class="float-end text-muted"><i class="fa-solid fa-star text-warning"
                                                                          data-bs-toggle="tooltip"
                                                                          data-bs-title="Your company"></i></span>
                                <?php endif; ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $company->industry ?></h6>
                            <p class="card-text" style="min-height: 155px"><?= $company->description ?></p>
                            <a href="/company/details?id=<?= $company->id ?>" class="btn btn-dark float-end">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>