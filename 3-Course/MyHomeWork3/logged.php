<?php
$pageTitle = "Съобщения";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
    include './Templates' . DIRECTORY_SEPARATOR . 'hello.php';
if ($_SESSION['isLogged']) {
    $userDir = realpath($_SESSION['user_name']);
    // echo mb_strlen($user_name).'<br />';
    // echo mb_strlen($pass).'<br />';
    // echo $user_login_id.'<br />';
    echo '<div id="chat"><hr />';
    $nomers = 0;
    $nomersmax = 0;
    mysql_query('SET NAMES utf8');
    $sql = ("SELECT * FROM chat ORDER BY chat_id DESC");
    $result = mysql_query($sql) or die(mysql_error());
    $nomersmax = mysql_num_rows($result);
    while ($nomers < $nomersmax) {
        $row = mysql_fetch_array($result);
        $nomers++;
        echo '
<div id="text">
От: ' . $row['user_name'] . ' (' . $row['user_login_id'] . ') <---> Дата: ' . date('Y : m : d --- час: H:i:s --- D', $row['time_add']) . '<br />
Пост: №' . $nomers . ' от ' . $nomersmax . '<br />' . $row['text_head'] . '<br />Съобщение: ' . $row['textchat'] . '
<hr />
</div>
';
    }
    echo '</div>';
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';