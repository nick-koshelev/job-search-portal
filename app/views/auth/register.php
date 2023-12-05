<h1>Registration</h1>

<?php
if (isset($errorMessage) && $errorMessage !== '') {
    echo "<p>" . $errorMessage . "</p>";
}
?>

<form action="/auth/register" method="post">
    <input type="text" name="username" value="<?php echo $userInput['username'] ?? '' ?>">
    <input type="text" name="firstname" value="<?php echo $userInput['firstname'] ?? '' ?>">
    <input type="text" name="surname" value="<?php echo $userInput['surname'] ?? '' ?>">
    <input type="text" name="email" value="<?php echo $userInput['email'] ?? '' ?>">
    <input type="password" name="password">
    <input type="password" name="repeatPassword">
    <input type="submit">
</form>