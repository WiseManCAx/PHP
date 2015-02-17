<?php
$_UbuntuMan = 'Hello, Ubumtu Man!';
if (file_exists('C:\Documents and Settings\user\Desktop\wisemancax.txt')) {
    echo 'File exist';

    echo '<br><br><hr><br>';
    $_wisemancax = file_get_contents('C:\Documents and Settings\user\Desktop\wisemancax.txt');
    echo $_wisemancax;
    echo '<br><br><hr><br>';
    var_dump($_wisemancax); //Не показвай този променлива в оригинален код - изтрий я.
} else {
    echo 'File do not Exist';
    file_put_contents('C:\Documents and Settings\user\Desktop\wisemancax.txt', $_UbuntuMan);
}