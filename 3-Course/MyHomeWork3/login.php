<?php

$pageTitle = "Влизане";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
if ($_SESSION['is_logged'] !== true) {
    if ($_POST['form_submit'] == 20131002) {
        $name = addslashes(trim($_POST['name']));
        $name = htmlspecialchars($name);
        $pass = trim($_POST['pass']);
        if ((mb_strlen($name) >= 5) && (mb_strlen($pass) >= 5)) {
            $kliu4 = (INT) $_POST['part'];
            switch ($kliu4) {
                case 0:
                    $rs = run_q('SELECT * FROM user_login WHERE user_name="' . $name . '" AND password="' . md5($pass) . '"');
                    if (mysql_numrows($rs) == 1) {
                        $row = mysql_fetch_assoc($rs);
                        $_SESSION['isLogged'] = "true";
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['pass'] = $row['password'];
                        $_SESSION['user_login_id'] = $row['user_login_id'];
                        $_SESSION['errorFlag'] = "true";
                        // echo $_SESSION['isLogged'];
                        // echo $_SESSION['user_name'];
                        header('Location: logged.php');
                        exit;
                    }
                    break;

                case 1:
                    $rs = run_q('SELECT * FROM user_login WHERE user_name="' . $name . '" AND password="' . md5($pass) . '"');
                    if (mysql_numrows($rs) == 1) {
                        $row = mysql_fetch_assoc($rs);
                        $_SESSION['isLogged'] = "true";
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['pass'] = $row['password'];
                        $_SESSION['user_login_id'] = $row['user_login_id'];
                        $_SESSION['errorFlag'] = "true";
                        // echo $_SESSION['isLogged'];
                        // echo $_SESSION['user_name'];
                        header('Location: logged.php');
                        exit;
                    }
                    break;

                default:
                    // НеДефиниран случай - Вероятно атака...
                    header('Location: index.php');
                    break;
            }
        } else {
            $_SESSION['errorFlag'] = "true";
            header('Location: index.php');
            exit;
        }
    } else {
        $_SESSION['errorFlag'] = "true";
        header('Location: index.php');
        exit;
    }
    $_SESSION['errorFlag'] = "true";
    header('Location: index.php');
    exit;
} else {
    $_SESSION['errorFlag'] = "true";
    header('Location: index.php');
    exit;
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';