<?php

session_start();

$file = $_GET['file'];
$file = $_SESSION['username'] . DIRECTORY_SEPARATOR . $file;

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=" . basename($file));
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: binary");
readfile($file);