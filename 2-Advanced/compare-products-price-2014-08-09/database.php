<?php

$connect = mysql_connect('localhost', 'root', '');
if (!$connect) {
    die('Could not connect to MySQL: ' . mysql_error());
}
mysql_select_db('compare_product_price', $connect);
