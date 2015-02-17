<?php
$pageTitle = "Вход";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';

if ($_SESSION['isLogged']) {
    header('Location: logged.php');
    exit;
}
$errorFlag = $_SESSION['errorFlag'];
if ($errorFlag) {
    echo '<div>Грешно въведени данни!</div>';
}
?>
<form class="form" method="post" action="login.php">
    <div>Username: <input type="text" name="username"></div>
    <div>Password: <input type="password" name="pass"></div>
    <div><a href="register.php">Регистрирай нов абонат</a> |
        <input type="submit" value="Вход"></div>
    <input type="hidden" name="form_submit" value="20131002">
</form>
<?php
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';