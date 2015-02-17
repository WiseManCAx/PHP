<?php

$pageTitle = 'Изтриване на елемент';
include 'header.php';
if (file_exists('data.txt')) {
    $ProductsList = file('data.txt');
}
$LineNumber = $_POST['indexForDelete'];
unset($ProductsList[$LineNumber]);
file_put_contents('data.txt', '');
foreach ($ProductsList as $FinalValue) {
    file_put_contents('data.txt', $FinalValue, FILE_APPEND);
}
header('location: index.php');
?>
