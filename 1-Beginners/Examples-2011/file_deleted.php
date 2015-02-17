<?php
$_UbuntuMan = 'Hello!';
if (file_exists('C:\Documents and Settings\user\Desktop\wisemancax.txt')) {
    unlink('C:\Documents and Settings\user\Desktop\wisemancax.txt');
    echo 'File deleted...';
    // С тази команда изтриваме (не го преместваме в кошчето) файла;
} else {
    echo 'File do not Exist';
    file_put_contents('C:\Documents and Settings\user\Desktop\wisemancax.txt', $_UbuntuMan);
}