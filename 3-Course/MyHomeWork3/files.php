<?php
$pageTitle = 'Качени файлове';
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
include './Templates' . DIRECTORY_SEPARATOR . 'hello.php';
if ($_SESSION['isLogged']) {
    $dirContents = scandir($_SESSION['user_name']);
    // echo '<pre>' . print_r($_SESSION['user_name'], true) . '</pre>';
    // echo '<pre>' . print_r($dirContents, true) . '</pre>';
    echo '<p class="center">Твоите файлове са: </p>';
    if (count($dirContents) <= 2) {
        echo '<p class="center">Нямаш качени файлове.</p>';
    } else {
        echo '<table class="center" border="1">
             <thead><tr><th>Име:</th><th>Размер:</th></tr></thead>';
        for ($i = 2; $i < count($dirContents); $i++) {
            $size = filesize($_SESSION['user_name'] . DIRECTORY_SEPARATOR . $dirContents[$i]);
            $link = '<a href="download.php?file=' . $dirContents[$i] . '" >';
            echo '<tr><td>' . $link . $dirContents[$i] . '</a></td><td>' . $size . ' b</td></tr>';
        }
        echo '</table>';
    }
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';