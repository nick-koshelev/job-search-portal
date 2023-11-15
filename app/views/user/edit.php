<h1>User edit page</h1>

<?php
if (isset($errorMessage) && $errorMessage !== '') {
    echo "<p>" . $errorMessage . "</p>";
}
?>

<form action="/user/edit?id=<?php echo $user->id ?? '' ?>" method="post">
    <input type="text" name="username" value="<?php echo $user->username ?? '' ?>">
    <input type="text" name="firstname" value="<?php echo $user->firstname ?? '' ?>">
    <input type="text" name="surname" value="<?php echo $user->surname ?? '' ?>">
    <input type="text" name="email" value="<?php echo $user->email ?? '' ?>">
    <input type="password" name="password">
    <input type="password" name="repeatPassword">
    <input type="submit">
</form>