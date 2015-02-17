<?php
session_start();
require ('system.php');
switch ($_GET['select']) {
    case "edit" :
        if ($_SESSION['username'] != NULL) {
            $id = (int) $_GET['id'];
            $sql = mysql_query("SELECT * FROM `news` WHERE `id` = '$id'") or die(mysql_error());
            $n = mysql_fetch_assoc($sql);
            ?>
            <form method="post" action="">
                <div>Заглавие</div>
                <input type="text" name="title" value="<?php echo $n['title']; ?>" /><br />
                <div>Новина</div>
                <textarea name="news" cols="30" rows="4"><?php echo $n['news']; ?></textarea><br />
                <div>Информация</div>
                <input type="text" name="info" value="<?php echo $n['info']; ?>" /><br />
                <input type="submit" name="edit" value="Редактирай" />
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $title = addslashes($_POST['title']);
                $news = addslashes($_POST['news']);
                $info = addslashes($_POST['info']);
                $update = mysql_query("UPDATE `news` SET `title` = '$title', `news` = '$news', `info` = '$info' WHERE `id` = '$id' AND `user` = '$_SESSION[name]'") or die(mysql_error());
                echo "Редактирахте новината успешно";
            }
        }
        break;

    case "delete" :
        if ($_SESSION['username'] != NULL) {
            $id = (int) $_GET['id'];
            $del = mysql_query("DELETE FROM  `news` WHERE `id` = '$id' AND `user` = '$_SESSION[name]'") or die(mysql_error());
            echo "Премахнахте новината успешно";
        }
        break;
}