<?php
$pageTitle = "Регистриран потребител";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
if ($_SESSION['isLogged']) {
    $username = $_SESSION['username'];
    $userDir = realpath('database' . DIRECTORY_SEPARATOR . $_SESSION['username']);
    ?>
    <div>Hello, <?php echo $username; ?>!
        <a href="upload.php">Качи файл</a> |
        <a href="files.php">Разгледай файловете</a> |
        <a href="logout.php">Изход</a></div>
    <?php
} else {
    ?>
    <a href="index.php">Влез</a>
    <a href="register.php">Регистрирай нов абонат</a>
    <?php
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';