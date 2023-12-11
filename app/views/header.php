<?php

$userLoggedIn = \models\UserManager::isUserLoggedIn();

if ($userLoggedIn) {
    $user = \models\UserManager::getUser($_SESSION["userId"]);
    if (!empty($user)) {
        $imageSrc = "data:" . $user->getImageType() . ";base64," . $user->image;
    }
}

?>
<script src="/app/views/jobs/buttonsEvents.js"></script>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 me-4 text-white text-decoration-none">
                <img class="me-2" src="/images/logo.png" alt="logo" width="40" height="40">
                <p class="logo_slogan m-0 pb-1">Work<span class="logo_blue">Vista</span></p>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white" onclick="redirectToJobs()">Vacancies</a></li>
                <li><a href="#" class="nav-link px-2 text-white" onclick="redirectToCompanies()">Companies</a></li>
                <!-- temporary -->
                <li><a href="#" class="nav-link px-2 text-white" onclick="redirectToVacancyCreate()">Add vacancy</a></li>
                <li><a href="#" class="nav-link px-2 text-white" onclick="redirectToCompanyCreate()">Add company</a></li>
                <!-- temporary -->
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <?php if (!$userLoggedIn) : ?>
                <div class="text-end">
                    <a href="/auth/login" class="btn btn-outline-light me-2">Login</a>
                    <a href="/auth/register" class="btn btn-warning">Sign-up</a>
                </div>
            <?php else : ?>
                <div class="flex-shrink-0 dropdown-center">
                    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (!empty($imageSrc)) : ?>
                            <img src="<?= $imageSrc ?>" width="40" height="40" class="rounded-circle bg-light"
                                 alt="Image">
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="/user">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/auth/logout">Sign-out</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>