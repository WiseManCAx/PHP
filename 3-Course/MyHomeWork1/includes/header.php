<?php
require 'constants.php';
require 'functions.php';
mb_internal_encoding('UTF-8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $pageTitle; ?></title>
        <!-- Header -->
        <link href="./Img/Icons/myIcon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="./CSS/style.css" rel="stylesheet" type="text/css" /> 
        <!-- end of header -->    
    </head>
    <body>
        <!-- Content -->
        <div class="floatCenter">
            <?php
            if (!$_SESSION['is_logged'] == true) {
                $_SESSION['login'] = 'Гостенин.';
            }
            ?>
            <div>Здравей: <a href="index-login.php"><?php echo $_SESSION['login']; ?></a>
                <?php
                if ($_SESSION['is_logged'] == true) {
                    echo ' | <a href ="form.php">Добави разход</a> |
                <a href="logout.php">Изход</a></div>';
                } else {
                    echo '<p>Нямаш право да добавяш и да редактираш разходите.</p><a class="button" href ="index-login.php">Влез (Login)</a>';
                }
                ?>
            </div>