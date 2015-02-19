<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>ADD RECORD</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>

    <body>
        <?PHP
        include 'config.php';
        ?>
        <form action="add.php" method="post" id="_form" name="_form">
            <?PHP
            if ($_REQUEST['m'] == 'add') {
                $_pName = trim($_POST['_name']);
                $_sql = "INSERT INTO tbl_table SET tbl_table.name ='$_pName' ";
                mysql_query($_sql) or die(mysql_error());
                $_html = "<a href =\"index.php\"> CLICK HERE </a>";
                $_label = "record succesfully added Lol ! ";
                //header('Location: index.php' );
                //exit;
            } else {
                $_label = "ADD RECORD";
                $_inputbox = "    <td>NAME</td>
    <td><input type=\"text\" name=\"_name\"></td>";
                $_html = "<input type=\"submit\" name=\"Submit\" value=\"Submit\">
	<input type=\"hidden\" name=\"m\" value=\"add\">";
            }
            ?>
            <table width="75%" border="1">
                <tr> 
                    <td width="19%"><?PHP echo $_label; ?></td>
                    <td width="81%">&nbsp;</td>
                </tr>
                <tr> 
<?PHP echo $_inputbox; ?>
                </tr>
                <tr> 
                    <td>&nbsp;</td>
                    <td><?PHP echo $_html ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>