<?php

$pageTitle = "Регистрирай се";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
if (!$_SESSION['isLogged'] == true) {
    if ($_POST['form_submit'] == 201310121) {
        include './Templates' . DIRECTORY_SEPARATOR . 'errors.php';
        $pas2 = trim($_POST['pass2']);
        $pass2 = htmlspecialchars($pass2);
        if ($_POST['i-agree'] != 201310122) {
            $error_array['i-agree'] = 'Вие все още не сте съгласни с условията.';
        }
        if ($pas != $pas2) {
            $error_array['pass_do_no_match'] = 'Не съвпадат паролите.';
        }
        if (!ereg("^[a-zA-Z0-9_.-]{5,64}$", $name)) {
            $error_array['nik_name'] = 'Невалидно ИМЕ!<br />Валидни са само латински букви и цифри. Без интервал и без специални символи.';
        }
        $code_posted = $_POST['captcha'];
        if (!$_SESSION['captcha'] == md5($code_posted) OR ($code_posted == "")) {
//сравняваме постнатият код с хеша на кода от изображението, запазен в сесията $_SESSION['captcha']
            $error_array['captcha'] = 'Captcha-та не е попълнена правилно!'; //ако всичко е наред, изкарваме съобщение.
        }
        if (!count($error_array) > 0) {
            $_POST['form_submit'] = 201310123;
            $sql = 'SELECT COUNT(*) as us FROM user_login WHERE user_name="' . addslashes($name) . '" OR password="' . md5($pas) . '"';
//echo $sql;
            $rs = run_q($sql);
            $row = fetch_all($rs);
//print_r($row);
            echo '<div id="conteiner-body-center">';
            echo '<br /><br />Брой записи в базата = ' . $row[0]['us'] . '<br /><br />';
            if ($row[0]['us'] == 0) {
                run_q('INSERT INTO user_login (user_name,password,password_basic,active,date_register)
                    VALUES("' . addslashes($name) . '","' . md5($pas) . '","' . $pas . '","' . (INT) $part . '",' . time() . ')');
                if (mysql_error()) {
                    $error_array['sql'] = '<h1>Грешка. Моля опитайте отново.</h1>';
                } else {
                    $_POST['pozdravleniq'] = 'Поздравления. Регистрирахте се успешно!';
                    echo '<br />СТЪПКА №1
                          <br /><br />' . $_POST['pozdravleniq'] . '
                          <br />Твоят акаунт е създаден успешно.';
                    echo '<br /><br /><a title="Home page"
                    rel="author" target="_top" href="index.php";>
                    Отидете на началната страница!
                    <img class="floatCenter" alt="Go to home page"
	            title="Go to home page"
	            src="./img/icons/bottom-arrow.gif">
                    </img><br /></a>
                    <br />Или автоматично ще бъдете пренасочени след 5 секунди.</div>';
                    header("refresh:5; url=index.php");
                    exit;
                }
            } else {
                $error_array['name'] = 'Името е заето.';
                echo '<br /><br />' . $error_array['name'];
                $error_array['pass'] = 'Паролата е заета.';
                echo '<br /><br />' . $error_array['pass'];
                $_POST['form_submit'] = "Error-201310123";
                echo '<br /><br />Моля, започнете нова регистрация.<br /><br />';
                echo '<a title="Home page"
                rel="Dobromir" target="_top" href="index.php";>
                Отидете на началната страница!
                <img class="floatCenter" alt="Go to home page"
	        title="Go to home page"
	        src="./img/icons/bottom-arrow.gif">
                </img><br /></a>
                <br />Или автоматично ще бъдете пренасочени след 5 секунди.</div>';
                header("refresh:5; url=index.php");
                exit;
            }
        }
    }
    if ($_POST['form_submit'] != "Error-201310123") {
        $title = 'Регистриране на потребителя';
        if ($error_array['sql']) {
            echo $error_array['sql'];
        }
        echo '<div id="conteiner-body-center">
        <form name="register" action="register.php" method="POST">
        <center>
        <table class="pretty">';
        if ($error_array['name']) {
            echo '<tr><td    colspan="2" class=center><p class="center">&nbsp;</p><span class="black-red"><i>' . $error_array['name'] . '</i></span></td></tr>';
        }
        echo '<tr class="height40"><td class="right">Въведи име</td><td class="left"><input type="text" name="name" value="' . $name . '" maxlength="64" /><span class="black-red">*</span></td></tr>';
        if ($error_array['pass']) {
            echo '<tr><td    colspan="2" class=center><p class="center">&nbsp;</p><span class="black-red"><i>' . $error_array['pass'] . '</i></span></td></tr>';
        }
        echo '<tr class="height40"><td class="right"><br />
    Парола</td><td class="left"><br /><input type="password" name="pass" value="" maxlength="32" /><span class="black-red">*</span></td></tr>';
        if ($error_array['pass_do_no_match']) {
            echo '<tr><td    colspan="2" class=center><p class="center">&nbsp;</p><span class="black-red"><i>' . $error_array['pass_do_no_match'] . '</i></span></td></tr>';
        }
        echo '<tr class="height40"><td class="right"><br />
    Повтори паролата</td><td class="left"><br /><input type="password" name="pass2" value="" maxlength="32"/><span class="black-red">*</span></td></tr>';
        echo '<tr><td class="right">
        <img src="captcha.php" /></td><td class="left">';
        if ($error_array['captcha']) {
            echo '<span class="black-red"><i>' . $error_array['captcha'] . '</i></span>';
        } else {
            echo '<br /><br />';
        }
        echo '</td></tr><tr><td class="right"><br />';
        echo 'Въведи Captcha</td><td class="left"><br /><input type="text" name="captcha" value="" maxlength="6" /><span class="black-red">*</span></td></tr></table>';
        echo '</center>';
        echo '<input type="hidden" name="form_submit" value="201310121">';
        if ($error_array['i-agree']) {
            echo '<p class="center">&nbsp;</p><span class="black-red"><i>' . $error_array['i-agree'] . '</i></span><p class="center">&nbsp;</p>';
        }
        echo '<input type="checkbox" name="i-agree" value="201310122">&nbsp;&nbsp;&nbsp;Съгласен съм с условията.<br /><input type="submit" name="create-an-account" value="&nbsp;&nbsp;&nbsp;Регистрирай се&nbsp;&nbsp;&nbsp;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="&nbsp;&nbsp;&nbsp;Reset form&nbsp;&nbsp;&nbsp;" name="Reset" /></form>';
        echo '</div>';
    }
} else {
    header('Location: index.php');
    exit;
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';