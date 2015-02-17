<?php
$pageTitle = 'Качени файлове';
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
include './Templates' . DIRECTORY_SEPARATOR . 'hello.php';
if ($_SESSION['isLogged']) {
    $dirContents = scandir($_SESSION['user_name']);
    // echo '<pre>' . print_r($_SESSION['user_name'], true) . '</pre>';
    // echo '<pre>' . print_r($dirContents, true) . '</pre>';
    if (isset($_POST['insert'])) {
        $text_head = trim($_POST['text_head']);
        $text_head = htmlspecialchars($text_head);
        $textchat = trim($_POST['textchat']);
        $textchat = htmlspecialchars($textchat);
        if (strlen($textchat) == NULL) {
            echo '<p class="center">Не сте въвели текст.</p>';
        } else {
            $user_name = $_SESSION['user_name'];
            mysql_query('SET NAMES utf8');
            run_q('INSERT INTO chat (user_name,user_login_id,text_head,textchat,time_add)
                    VALUES("' . $user_name . '",' . $user_login_id . ',"' . $text_head . '","' . $textchat . '",' . time() . ')');
            echo '<p class="center">Поздравления!!!<br />Вие успешно изпратихте ново съобщение.<br /><br /><a href="index.php">Към страницата за вход</a>
                          <br />Или автоматично ще бъдете пренасочени след 5 секунди.</p>';
            header("refresh:5; url=index.php");
            exit;
        }
    }
    echo '<div id="form" class="center">
                <form method="POST" action="message_new.php">
				Заглавие: <br />
                <input type="text" name="text_head" size="130" class="input" maxlength="50" /><br /><br />
				Съобщение: <br />
				<textarea name="textchat" cols="130" rows="7" maxlength="250">' . $textchat . '</textarea><br /><br />
                <input type="submit" title="Добави" name="insert" value="Добави" class="input" />
                </form>
          </div>';
}
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';