<?php

$user = "bgdomou_complim";
$pass = "Bl+w3zlCb)wDl%z~{Z*irfQW";
$db = "compliments";
$host = "localhost";
$connection = mysql_connect($host, $user, $pass) or die("Сайтът не може да се свърже към сървъра!");
mysql_query('SET NAMES utf8');
$db = mysql_select_db($db, $connection)or die("Сайтът не може да се свърже към базата данни!");
