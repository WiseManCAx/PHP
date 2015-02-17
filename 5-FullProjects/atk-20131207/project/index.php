<?php
session_start();
require ('system.php');
if ($_SESSION['username'] != NULL) {
    ?>
    Добре дошъл: <?php echo $_SESSION['name']; ?>
    <a href="signout.php">Изход</a>
    <?php
} else {
    ?>
    <form method="post" action="login.system.php">
        <div>Потребителско име</div>
        <input type="text" name="username" /><br />
        <div>Парола</div>
        <input type="password" name="password" /><br />
        <input type="submit" name="login" value="Вход" />
    </form>
    <a href="register.php">Регистрирай ме</a>
    <?php
}