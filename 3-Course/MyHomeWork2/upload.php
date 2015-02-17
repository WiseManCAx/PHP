<?php
$pageTitle = 'Качване на файлове';
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';

if ($_SESSION['isLogged']) {
    if ($_FILES) {
        $userDir = realpath($_SESSION['username']);
        // echo '<pre>' . print_r($_FILES['upload']['tmp_name'], true) . '</pre> FILES';
        // echo '<pre>' . print_r($userDir, true) . '</pre> userDir';
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $userDir . DIRECTORY_SEPARATOR . $_FILES['upload']['name'])) {
            echo '<p>Файлът е качен успешно!</p>';
        } else {
            echo '<p>Неуспешно качване!</p>';
        }
        echo '<br /><a href="index.php">Към страницата за вход</a>';
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div>Качи файл: <input type="file" name="upload"></div>
        <div><input type="submit" value="Качи"> </div>
    </form>
    <?php
} else {
    echo '<p>Трябва да сте регистрирани в ситемата!</p>';
    echo '<p><a href="index.php">Вход</a></p>';
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';