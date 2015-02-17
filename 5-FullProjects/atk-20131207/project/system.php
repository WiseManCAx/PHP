<?php
define("dbhost", "localhost");
define("dbuser", "root");
define("dbpass", "");
define("dbtable", "");
$connect = mysql_connect(dbhost, dbuser, dbpass) or die("Не мога да се свържа с базата данни!");
$conn = mysql_select_db(dbtable, $connect) or die("Не мога да избера таблица!");
