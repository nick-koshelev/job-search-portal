<nav class="header_nav">
    <div class="logo">
        <img class="logo_img" src="/images/logo.png" alt="logo">
        <p class="logo_slogan">Work<span class="logo_blue">Vista</span></p>
    </div>

    <ul class="header_tabs">
        <li class="header_tabs_item"><a href="#">Jobs</a></li>
        <li class="header_tabs_item"><a href="#">Browse Companies</a></li>
    </ul>
    <?php if (!\models\UserManager::isUserLoggedIn()): ?>
        <div class="header_btn_section">
            <a href="/auth/login" class="btn login_btn">Login</a>
            <div id="vert"></div>
            <a class="sign_up_btn" href="/auth/register">Sign Up</a>
        </div>
    <?php else: ?>
        <div>
            <a href="/user" class="btn">My account</a>
            <a href="/auth/logout" class="btn">Logout</a>
        </div>
    <?php endif; ?>
</nav>