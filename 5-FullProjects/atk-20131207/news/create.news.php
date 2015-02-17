<?php
session_start();
require ('system.php');
if ($_SESSION['username'] != NULL) {
    ?>
    <form method="post" action="">
        <div>Заглавие</div>
        <input type="text" name="title" /><br />
        <div>Новина</div>
        <textarea name="news" cols="30" rows="4"></textarea><br />
        <div>Информация</div>
        <input type="text" name="info" value="http://www.arnaudow.tk/bg/" /><br />
        <input type="submit" name="create" value="Публикувай" />
    </form>
    <?php
    if (isset($_POST['create'])) {
        $title = addslashes($_POST['title']);
        $news = addslashes($_POST['news']);
        $info = addslashes($_POST['info']);
        $user = $_SESSION['name'];
        $date = date("d.m.Y H:i");
        if ($title == NULL) {
            echo "Не сте попълнили заглавие на новината";
        } elseif ($news == NULL) {
            echo "Не сте попълнили новината";
        } else {
            $sql = mysql_query("INSERT INTO `news` (title, news, user, date, info) VALUES ('$title', '$news', '$user', '$date', '$info')") or die(mysql_error());
            echo "Публикувахте новината успешно";
        }
    }
} else {
    echo "За да публикувате новина трябва да сте регистрирна потребител";
}