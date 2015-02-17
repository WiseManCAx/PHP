<?php

$pageTitle = 'Качени файлове';
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';

if ($_SESSION['isLogged']) {
    $dirContents = scandir($_SESSION['username']);
    // echo '<pre>' . print_r($_SESSION['username'], true) . '</pre>';
    // echo '<pre>' . print_r($dirContents, true) . '</pre>';
    echo '<p>Твоите файлове са: </p>';

    if (count($dirContents) <= 2) {
        echo '<p>Нямаш качени файлове все още.</p>';
    } else {
        echo '<table border="1">
             <thead><tr><th>Име</th><th>Размер</th></tr></thead>';

        for ($i = 2; $i < count($dirContents); $i++) {
            $size = filesize($_SESSION['username'] . DIRECTORY_SEPARATOR . $dirContents[$i]);
            $link = '<a href="download.php?file=' . $dirContents[$i] . '" >';
            echo '<tr><td>' . $link . $dirContents[$i] . '</a></td><td>' . $size . ' b</td></tr>';
        }
        echo '</table>';
    }
    echo '<br /><a href="index.php">Към страницата за вход</a>';
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';