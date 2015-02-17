<?php

session_start();
$pageTitle = 'Списък';
include 'includes/header.php';

if ($_SESSION['is_logged'] == true) {
    echo '<center>';
    echo '<a class="button" href="add.php">Добави нов потребител</a>';
    // TODO list ot friends;
    $friends = file('pass.txt');
    // TODO виж също така file_get_contents
    echo '<br /><br /><table class="pretty">
            <tr><td>Name</td><td>Email</td><td>Phone</td></tr>';
    foreach ($friends as $v) {
        $tmp = explode(';', $v);
        foreach ($tmp as $vv) {
            $tmp2 = explode(':', $vv);
            //echo '<pre>' . print_r($tmp2, true) . '</pre>';
            if ($tmp2[0] == 'name') {
                $name = $tmp2[1];
            } elseif ($tmp2[0] == 'email') {
                $email = $tmp2[1];
            } elseif ($tmp2[0] == 'phone') {
                $phone = $tmp2[1];
            }
        }
        echo '<tr><td>' . $name . '</td><td>' . $email . '</td><td>' . $phone . '</td></tr>';
    }
    echo '</table></center>';
} else {
    if ($_GET['error'] == 1 OR $_GET['error'] == 2) {
        echo "Wrong Username/Pasword";
    }
    ?>
    <center>
        <form class="form" method="post" action="login.php">
            <div>
                Потребителско име: <input type="text" name="login">
            </div>
            <div>
                Парола: <input type="password" name="pass">
            </div>
            <input class="button" type="submit" value="Login"><br />
        </form>
    </center>
    <?php

}
include 'includes/footer.php';