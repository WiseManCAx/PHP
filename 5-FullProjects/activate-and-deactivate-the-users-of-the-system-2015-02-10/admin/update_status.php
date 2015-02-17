<?php

session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../index.php');
}

require_once('../config.php');

$get_userid = $_GET['userid'];

$result = $dbh->prepare("Select * From tb_users Where id='$get_userid'");
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $curr_status = $row['user_status'];
}

if ($curr_status == "active") {
    $sql = "UPDATE tb_users 
        SET user_status=?
		WHERE id=?";

    $this_status = "deactive";
    $q = $dbh->prepare($sql);
    $q->execute(array($this_status, $get_userid));
    header("location: index.php");
} else {
    $sql = "UPDATE tb_users 
        SET user_status=?
		WHERE id=?";

    $this_status = "active";
    $q = $dbh->prepare($sql);
    $q->execute(array($this_status, $get_userid));
    header("location: index.php");
}
?>