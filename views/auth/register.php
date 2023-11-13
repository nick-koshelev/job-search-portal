<h1>Registration</h1>

<?php
if (isset($errorMessage) && $errorMessage !== '') {
    echo "<p>" . $errorMessage . "</p>";
}
?>

<form action="/auth/register" method="post">
    <input type="text" name="username" value="<?php echo isset($userInput['username']) ? $userInput['username'] : '' ?>">
    <input type="text" name="firstname" value="<?php echo isset($userInput['firstname']) ? $userInput['firstname'] : '' ?>">
    <input type="text" name="surname" value="<?php echo isset($userInput['surname']) ? $userInput['surname'] : '' ?>">
    <input type="text" name="email" value="<?php echo isset($userInput['email']) ? $userInput['email'] : '' ?>">
    <input type="password" name="password">
    <input type="password" name="repeatPassword">
    <input type="submit">
</form>