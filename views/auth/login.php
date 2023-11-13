<h1>Login</h1>

<?php
if (isset($errorMessage) && $errorMessage !== '') {
    echo "<p>" . $errorMessage . "</p>";
}
?>

<form action="/auth/login" method="post">
    <input type="text" name="username"
           value="<?php echo isset($userInput['username']) ? $userInput['username'] : '' ?>">
    <input type="password" name="password">
    <input type="submit">
</form>