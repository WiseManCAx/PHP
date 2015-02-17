<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Proba</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    </head>
    <body>
        <?php
        if ($_SESSION['is_logget'] == true) {
            echo "Log GET";
            echo '<a href="logout.php">Logout</a>';
        } else {
            $login = trim($_POST['login']);
            $pass = trim($_POST['pass']);
            if (strlen($login) > 6 && strlen($pass) > 6) {
                echo "ok";
                if ($login == "wisemancax" && $pass == "zaqwsx") {
                    $_SESSION['is_logget'] = true;
                    header('Location: primera.php');
                } else {
                    echo "Wrong UserName/Password"; {
                        
                    }
                }
            }
            ?>
            <form metod="post" action="primera.php">
                Username:<input type="text" name="login"><br>
                Password:<input type="password" name="pass"><br>
                <input type="submit" value="Изпрати заявката" name="Submit" tabindex="1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" value="Изчисти формата" name="Reset" tabindex="2">
            </form>
            <?php
        }
        ?>
    </body>
</html>