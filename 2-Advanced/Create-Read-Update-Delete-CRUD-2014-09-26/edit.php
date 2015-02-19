<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>EDIT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>

    <body>
        <?PHP
        ob_start();
        include 'config.php';
        $_id = intval($_GET['id']);
        echo $_sql = "SELECT * FROM tbl_table WHERE tbl_table.id = '$_id' ";
        $_rs = mysql_query($_sql) or die(mysql_error());
        while ($_rw = mysql_fetch_object($_rs)) {
            $_id = $_rw->id;
            $_name = $_rw->name;
        }
        ?>
        <?PHP
        if ($_REQUEST['edit'] == 'edit') {
            $_name = $_REQUEST['_name'];
            $_id = $_REQUEST['id'];
            $_SQL = "UPDATE tbl_table SET tbl_table.name = '$_name' 
  	   WHERE tbl_table.id = '$_id' ";
            mysql_query($_SQL) or die(mysql_error());
            //header("Location : index.php?id=$_id");
            $_html = "<tr> 
       <td width=\"19%\">RECORD HAS BEEN </td>
       <td width=\"81%\">UPDATED CLICH <a href=\"index.php?id=$_id\">HERE</a></td>
     </tr>";
        } else {
            $_html = "<tr> 
       <td width=\"19%\">EDIT</td>
       <td width=\"81%\">&nbsp;</td>
     </tr>
     <tr> 
       <td>NAME</td>
       <td><input type=\"text\" name=\"_name\" value=\"$_name\"></td>
     </tr>
     <tr> 
       <td>&nbsp;</td>
       <td><input type=\"submit\" name=\"Submit\" value=\"Submit\">
   		<input type=\"hidden\" name=\"id\" value=\"$_id\">
   		<input type=\"hidden\" name=\"edit\" value=\"edit\">
   	</td>
     </tr>";
        }
        ?>
        <form action="edit.php" method="post" id="_form" name="_form">
            <table width="75%" border="1">
            </table>
        <?PHP echo $_html; ?>
        </form>
    </body>
</html>
