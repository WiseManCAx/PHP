<?php
session_start();
require ('system.php');
?>
<form method="post" action="">
    <div>Потребителско име</div>
    <input type="text" name="username" /><br />
    <div>Парола</div>
    <input type="password" name="password" /><br />
    <div>Отново парола</div>
    <input type="password" name="password2" /><br />
    <div>И-мейл</div>
    <input type="text" name="email" /><br />
    <div>Отново и-мейл</div>
    <input type="text" name="email2" /><br />
    <div>Истинско име</div>
    <input type="text" name="name" /><br />
    <input type="submit" name="signup" value="Регистрирай ме" />
</form>
<?php
if (isset($_POST['signup'])) {
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $password2 = md5(addslashes($_POST['password2']));
    $email = addslashes($_POST['email']);
    $email2 = addslashes($_POST['email2']);
    $name = addslashes($_POST['name']);
    $date = date("d.m.Y H:I");
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysql_error());
    if (mysql_num_rows($sql) != NULL) {
        echo "Потребителското име вече е заето";
    } else {
        if ($password != $password2) {
            echo "Паролите не съвпадат";
        } elseif ($email != $email2) {
            echo "И-мейл #1 и и-мейл #2 не съвпадат";
        } elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
            echo "Невалиден и-мейл";
        } elseif ($name == NULL) {
            echo "Не сте попълнили истинското си име";
        } else {
            $up = mysql_query("INSERT INTO `users` (username, password, email, name, date, ip) VALUES ('$username', '$password', '$email', '$name', '$date', '$ip')") or die(mysql_error());
            echo "Създадохте акаунта си успешно";
        }
    }
}