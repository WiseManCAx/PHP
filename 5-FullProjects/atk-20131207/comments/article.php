<?php
session_start();
require ('system.php');
$id = (int) $_GET['topic'];
$sql = mysql_query("SELECT * FROM `news` WHERE `id` = '$id'") or die(mysql_error());
$n = mysql_fetch_assoc($sql);
$num = $n['num'] + 1;
$update = mysql_query("UPDATE `news` SET `num` = '$num' WHERE `id` = '$id'") or die(mysql_error());
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#emoticons a").click(function () {
            var code = $(this).attr('title');
            var comment = $("#message_f").val();
            var newComment = comment + code;
            $("#message_f").val(newComment);
        });
    });
</script>
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
<h3><b>Коментари</b></h3>
<?php
if ($_SESSION['username'] != NULL) {
    if (isset($_POST['cc'])) {
        $comment = addslashes($_POST['comment']);
        $user = $_SESSION['name'];
        $date = date("d.m.Y H:i");
        $topic = $id;
        if ($comment != NULL) {
            $ins = mysql_query("INSERT INTO `comments` (comment, user, date, topic) VALUES ('$comment', '$user', '$date', '$topic')") or die(mysql_error());
        }
    }
    ?>
    <div id="emoticons">
        <a href="javascript:;" title=":)"><img src="smiles/smile.gif" title=":)" /></a>
        <a href="javascript:;" title="(sun)"><img src="smiles/sun.gif" title="(sun)" /></a>
        <a href="javascript:;" title=":6"><img src="smiles/drink.gif" title=":6" /></a>
    </div>
    <form method="post" action="">
        <textarea name="comment" cols="40" id="message_f" rows="3"></textarea><br />
        <input type="submit" name="cc" value="Коментирай" />
    </form>
    <?php
} else {
    echo "За да добавите своя коментар трябва да сте регистриран потребител";
}
$all = mysql_query("SELECT * FROM `comments` WHERE `topic` = '$id' ORDER BY `id` DESC") or die(mysql_error());
while ($c = mysql_fetch_assoc($all)) {
    $comm = str_replace(":)", "<img src='smiles/smile.gif' title=':)' />", $c['comment']);
    $comm = str_replace("(sun)", "<img src='smiles/sun.gif' title=':)' />", $comm);
    $comm = str_replace(":6", "<img src='smiles/drink.gif' title=':)' />", $comm);
    ?>
    <div style="border: 1px solid #000000; width: 400px; padding: 2px;">
        <div style="background-color: orange; width: 400px;"><?php echo $c['user']; ?> <a style="float: right;"><?php echo $c['date']; ?></a></div>
        <div style="background-color: #b1b1b1;"><?php echo $comm ?></div>
    </div>
    <br />
    <?php
}