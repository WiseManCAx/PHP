<?php
if ($_SESSION['isLogged']) {
    $user_name = $_SESSION['user_name'];
    $user_name = htmlspecialchars($user_name);
    $pass = $_SESSION['pass'];
    $pass = htmlspecialchars($pass);
    $user_login_id = $_SESSION['user_login_id'];
    echo '<div>Здравей, ' . $user_name . '. |
        <a href="index.php">Начало</a> |
        <a href="message_new.php">Ново съобщение</a> |
        <a href="upload.php">Качи файл</a> |
        <a href="files.php">Разгледай файловете</a> |
        <a href="logout.php">Изход</a>
</div>';
}
else {
    echo '<div>Здравейте.<br />
        Тази страница се вижда само<br />
        и единствено от<br />
        РЕГИСТРИРАНИ<br />
        потребители.<br />
    <a href="index.php">Влез</a> - - -
    <a href="register.php">Регистрирай се</a>
</div>';
}