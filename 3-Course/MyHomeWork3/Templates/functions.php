<?php
$db_host = "localhost";
// Place the username for the MySQL database here 
$db_username = "user";
// Place the password for the MySQL database here 
$db_pass = "qwerty";
// Place the name for the MySQL database here 
$db_name = "php_kurs_homework";

// Run the actual connection here 
mysql_connect("$db_host", "$db_username", "$db_pass") or die(trigger_error(mysql_error(), E_USER_ERROR));
mysql_select_db("$db_name") or die('<br /><br />Не откривам базата данни');

function run_q($sql) {
    mysql_query('SET NAMES utf8');
    $rs = mysql_query($sql);
    if (mysql_error()) {
        echo mysql_error() . ' SQL: ' . $sql;
        die('<br /><br />Връзката не може да бъде установена!');
    }
    // echo 'Връзката е установена успешно';
    mysql_close($link);
    return $rs;
}

function fetch_all($rs) {
    while ($row = mysql_fetch_assoc($rs)) {
        $resp[] = $row;
    }
    return $resp;
}