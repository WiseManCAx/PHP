<?PHP
require('pagedresults.php');
include 'config.php';
if ($_REQUEST['m'] == 'del') {
    $_sql = "DELETE FROM tbl_table WHERE tbl_table.id =" . $_REQUEST['id'];
    mysql_query($_sql) or die(mysql_error());
    echo "<script language=\"javascript\"> 
   		location.href=index.php
        </script>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>index page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>

    <body>
        <table width="75%" border="1">
            <tr>
                <td colspan="3">Create Read Update Delete CRUD PHP Source Code</td>
            </tr>
            <tr> 
                <td>ID</td>
                <td>NAME</td>
                <td>OPTIONS</td>
            </tr>
            <?PHP
//	$_id = intval ( $_REQUEST['id'] );
            $_sql = "select * from tbl_table";
            $rs = new MySQLPagedResultSet("select * from tbl_table", 5, $_link);
            //$_sql = "SELECT * FROM tbl_table";
            // $_rs = mysql_query($_sql ) or die(mysql_error());
            $_rs = mysql_query($_sql) or die(mysql_error());
            //$_rs = mysql_num_rows($rs);

            if ($_rs) {
                //while ( $_rw = mysql_fetch_object ($_rs ) ) 
                // while ( $_rw = mysql_fetch_object ($rs ) )
                while ($_rw = $rs->fetchArray()) {
                    $_html = "<tr> 
    <td>$_rw[id]</td>
    <td>$_rw[name]</td>
    <td>
   <a href=\"edit.php?id=$_rw[id]&m=edit\">EDIT</a> | <a href=\"index.php?id=$_rw[id]&m=del\">DELETE </a></td>
    </tr>";
                    echo $_html;
                }
            } else {
                $_html = "<tr> 
    <td><strong>RECORD</strong></td>
  <td><strong>EMPTY</strong></td>
  <td>
 <a href=\"edit.php?id=$_rw[id]&m=edit\">EDIT</a> | <a href=\"index.php?id=$_rw[id]&m=del\">DELETE </a></td>
		</tr>";
                echo $_html;
            }
            ?>
            <tr> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><a href="add.php">ADD NEW RECORD</a></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <p><?= $rs->getPageNav("AID=$aid") ?></p> 
    </body>
</html>