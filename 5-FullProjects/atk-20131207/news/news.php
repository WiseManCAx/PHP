<?php
session_start();
require ('system.php');
$sql = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC") or die(mysql_error());
?> <h1><b>Новини</b></h1> <?php
while ($n = mysql_fetch_assoc($sql)) {
    ?>
    <div><a href="article.php?topic=<?php echo $n['id']; ?>"><b><?php echo $n['title']; ?></b></a></div><br />
    <?php
}