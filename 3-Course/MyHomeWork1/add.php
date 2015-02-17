<?php
session_start();
$pageTitle = 'Списък';
include 'includes/header.php';

if ($_SESSION['is_logged'] == true) {
    if ($_POST['formSubmit'] == hidden2013) {
        $name = trim($_POST['name']);
        $pass = trim($_POST['pass']);
        $pass2 = trim($_POST['pass2']);
        $email = trim($_POST['email']);
        // TODO Регулярни изрази за правилно попълнени полета - име, поща и т.н.
        $phone = trim($_POST['phone']);
        if (strlen($name) > 3 && strlen($pass) > 3 && strlen($email) > 5) {
            $tmp = 'name:' . $name . ';pass:' . md5($pass) . ';email:' . $email . ';phone:' . $phone . ';';
            file_put_contents('pass.txt', $tmp . "\r\n", FILE_APPEND);
            echo "Данните са записани успешно.";
        } else {
            echo "Грешка! Повтори отново.";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="post" action="add.php">
        <input type="hidden" name="formSubmit" value="hidden2013">
        Име: <input type="text" name="name" maxlength="32" tabindex="8" maxlength="32" /> *<br />		
        Парола: <input type="password" name="pass" value="pass2013" maxlength="32" /> *<br />
        Повтори паролата: <input type="password" name="pass2" value="pass2013" maxlength="32" /> *<br />
        Емайл: <input type="text" name="email" maxlength="32" /> *<br />
        Телефон: <input type="text" name="phone" maxlength="32" /><br />
        <input type="submit" value="Добави нов потребител">
    </form>
    <?php
    echo '<br />Полетата със звездичка са задължителни.<br />';
    echo '<a href="index-login.php">Виж въведените данни</a>';
} else {
    header('Location: index.php');
    exit;
}
include 'includes/footer.php';