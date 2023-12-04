<?php

$userLoggedIn = \models\UserManager::isUserLoggedIn();

?>

<nav class="header_nav">
    <div class="logo">
        <img class="logo_img" src="/images/logo.png" alt="logo">
        <a href="/" class="text-decoration-none text-dark mt-3"><p class="logo_slogan">Work<span
                        class="logo_blue">Vista</span></p></a>
    </div>

    <div>
        <ul class="header_tabs">
            <li class="header_tabs_item">
                <a href="#" class="text-decoration-none btn btn-dark mt-3" onclick="redirectToJobs()">Jobs</a>
            </li>
            <?php if ($userLoggedIn): ?>
                <li class="header_tabs_item">
                    <a href="#" class="text-decoration-none btn btn-dark mt-3" onclick="redirectToVacancyCreate()">Create
                        vacancy</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="mt-0 pt-0">
        <?php if (!$userLoggedIn): ?>
            <a href="/auth/login" class="text-decoration-none btn btn btn-dark">Login</a>
            <a class="text-decoration-none btn btn btn-dark" href="/auth/register">Sign Up</a>
        <?php else: ?>
            <a href="/user" class="text-decoration-none btn btn btn-dark">My account</a>
            <a href="/auth/logout" class="text-decoration-none btn btn btn-dark">Logout</a>
        <?php endif; ?>
    </div>
</nav>
<script src="/app/views/jobs/buttonsEvents.js"></script>