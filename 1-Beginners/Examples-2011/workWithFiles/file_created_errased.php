<?php

$a = 'My name is Dobromir.';
if (file_exists('myfile.txt')) {
    echo 'File exists.<br>';
    $_sydyrjanie = file_get_contents('myfile.txt');
    echo 'Съдържанието е: ' . $_sydyrjanie . '<br><br>';
    unlink('myfile.txt');
    echo '...wait ...File deleted';
} else {
    echo 'File do not exists<br>';
    file_put_contents('myfile.txt', $a);
    echo '...wait ...File created!';
}