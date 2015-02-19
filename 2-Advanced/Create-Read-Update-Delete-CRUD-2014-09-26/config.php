<?PHP

$_localhost = 'localhost';
$_root = 'root';
$_password = '';
$_database = 'CRUD';
$_link = mysql_connect($_localhost, $_root, $_password) or die(mysql_error());
mysql_select_db($_database, $_link) or die(mysql_error());
