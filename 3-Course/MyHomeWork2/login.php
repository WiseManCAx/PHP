<?php

$pageTitle = "Влизане";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';

if ($_POST['form_submit'] == 20131002) {
    if (file_exists('database.txt')) {
        $username = trim($_POST['username']);
        $pass = trim($_POST['pass']);

        $readFile = file('database.txt');

        foreach ($readFile as $v) {
            $column = explode('!*/', $v);

            if ($username == trim($column[0]) && $pass == trim($column[1])) {
                $_SESSION['isLogged'] = "true";
                $_SESSION['username'] = $username;
                $_SESSION['errorFlag'] = "true";
                // echo $_SESSION['isLogged'];
                // echo $_SESSION['username'];
                header('Location: logged.php');
                exit;
            }
        }
    }
} else {
    $_SESSION['errorFlag'] = "false";
    header('Location: index.php');
    exit;
}
$_SESSION['errorFlag'] = "false";
header('Location: index.php');
exit;
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';