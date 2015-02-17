<?php

$pageTitle = "Регистрирай се";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';

if ($_SESSION['isLogged']) {
    echo '<p>Вече си регистриран като ' . $_SESSION['username'] . '!</p>';
} else {
    if ($_POST) {
        $username = trim($_POST['username']);
        $username = str_replace('!*/', '', $username);

        $pass = trim($_POST['pass']);
        $pass = str_replace('!*/', '', $pass);

        $errorFlag = false;

        if (mb_strlen($username) < 3) {
            echo 'Името трябва да е с повече символа!';
            $errorFlag = true;
        }
        if (mb_strlen($pass) < 3) {
            echo 'Паролата трябва да е с повече символа!';
            $errorFlag = true;
        }
        if (!$errorFlag) {
            $input = $username . '!*/' . $pass . PHP_EOL;
            file_put_contents('database.txt', $input, FILE_APPEND);

            $userDir = $username;
            mkdir($userDir);

            header('Location: index.php');
            exit;
        } else {
            echo '<div>Грешно въведени данни!</div>';
        }
    }
    ?>
    <p>Форма за регистрация:</p>
    <form method="POST">
        <div>Име: <input type="text" name="username"></div>
        <div>Парола: <input type="password" name="pass"></div>
        <div><input type="submit" value="Регистрирай се"> </div>
    </form>
    <?php

}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';