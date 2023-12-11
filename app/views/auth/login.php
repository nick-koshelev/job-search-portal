<?php

$showHeader = false;
$showFooter = false;

?>

<section class="min-vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100" style="background-color: #508bfc;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="card-body p-5 py-3 text-center">
                        <div style="font-family: 'Agbalumo', sans-serif; font-size: 35px;">
                            <a href="/" class="link-dark" style="text-decoration: none">
                                <p>Work<span style="color: #3973b8">Vista</span></p>
                            </a>
                        </div>

                        <h3 class="mb-4">Login</h3>

                        <?php
                        if (isset($errorMessage) && $errorMessage !== '') {
                            echo "<div class=\"alert alert-danger text-start\" role=\"alert\">$errorMessage</div>";
                        }
                        ?>

                        <form action="/auth/login" method="post">
                            <div class="form-outline mb-4 text-start">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                       value="<?php echo $userInput['username'] ?? '' ?>"/>
                            </div>

                            <div class="form-outline mb-4 text-start">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password"
                                       class="form-control"/>
                            </div>

                            <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                            <p class="mt-3">Not a member yet? <a href="/auth/register">Sign up now!</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>