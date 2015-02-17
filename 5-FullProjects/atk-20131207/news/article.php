<?php
session_start();
require ('system.php');
$id = (int) $_GET['topic'];
$sql = mysql_query("SELECT * FROM `news` WHERE `id` = '$id'") or die(mysql_error());
$n = mysql_fetch_assoc($sql);
$num = $n['num'] + 1;
$update = mysql_query("UPDATE `news` SET `num` = '$num' WHERE `id` = '$id'") or die(mysql_error());
?>
<h1><b><?php echo $n['title']; ?></b></h1>
<div><i><?php echo $n['news']; ?></i></div>
<table>
    <tr><td><b>Добавил</b></td><td><i><?php echo $n['user']; ?></i></td></tr>
    <tr><td><b>Информация</b></td><td><a href="<?php echo $n['info']; ?>" target="_blank"><i><?php echo $n['info']; ?></i></a></td></tr>
    <tr><td><b>Добавена на</b></td><td><i><?php echo $n['date']; ?></i></td></tr>
    <tr><td><b>Преглеждания</b></td><td><i><?php echo $n['num']; ?></i></td></tr>
    <?php
    if ($_SESSION['name'] == $n['user']) {
        ?>
        <tr><td><b>Опции</b></td><td><a href="settings.php?select=edit&id=<?php echo $id; ?>"><i>Редактирай</i></a> | <a href="settings.php?select=delete&id=<?php echo $id; ?>"><i>Премахни</i></a></td></tr>
        <?php
    }
    ?>
</table>