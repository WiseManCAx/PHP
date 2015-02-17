<?php
session_start();
require ('system.php');
if (isset($_POST['login'])) {
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $sql = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'") or die(mysql_error());
    if (mysql_num_rows($sql) != NULL) {
        $user = mysql_fetch_assoc($sql);
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        header('Location: index.php');
    } else {
        echo "Грешно потребителско име или парола";
    }
}