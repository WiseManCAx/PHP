<?php

session_start();

$login = trim($_POST['login']);
$pass = trim($_POST['pass']);
if (strlen($login) > 3 && strlen($pass) > 3) {
    $loginUser = file('pass.txt');
    foreach ($loginUser as $v) {
        $tmp = explode(';', $v);
        foreach ($tmp as $vv) {
            $tmp2 = explode(':', $vv);
            //echo '<pre>' . print_r($tmp2, true) . '</pre>';
            if ($tmp2[0] == 'name') {
                $name = $tmp2[1];
            } elseif ($tmp2[0] == 'pass') {
                $passMD5 = $tmp2[1];
            }
            if ($login == $name && md5($pass) == $passMD5) {
                $_SESSION['is_logged'] = true;
                $_SESSION['login'] = $login;
                header('Location: index.php');
            } else {
                echo "Wrong Username/Pasword";
                header('Location: index.php?error=1');
            }
        }
    }
} else {
    echo "Wrong Username/Pasword";
    header('Location: index.php?error=2');
}