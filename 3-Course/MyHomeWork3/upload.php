<?php
$pageTitle = 'Качване на файлове';
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
    include './Templates' . DIRECTORY_SEPARATOR . 'hello.php';
if ($_SESSION['isLogged']) {
    if ($_FILES) {
        $userDir = realpath($_SESSION['user_name']);
        // echo '<pre>' . print_r($_FILES['upload']['tmp_name'], true) . '</pre> FILES';
        // echo '<pre>' . print_r($userDir, true) . '</pre> userDir';
        if ($userDir == false) {
            $userDir = $_SESSION['user_name'];
            mkdir($userDir);
        }
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $userDir . DIRECTORY_SEPARATOR . $_FILES['upload']['name'])) {
            echo '<p class="center">Поздравления!
                <br />Файлът е качен успешно във вашата папка.</p>';
        } else {
            echo '<p class="center">Съжалявам. Неуспешно качване!</p>';
        }
        echo '<p class="center"><a href="index.php">Към страницата за вход</a>
                          <br />Или автоматично ще бъдете пренасочени след 5 секунди.</p>';
        header("refresh:5; url=index.php");
        exit;
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div>Качи файл: <input type="file" name="upload"></div>
        <div><input type="submit" value="Качи"> </div>
    </form>
    <?php
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';