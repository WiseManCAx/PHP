<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?PHP
include('conf.php');
$query = "SELECT * FROM compliments ORDER by id DESC LIMIT 13";
$result = mysql_query($query);
echo"<div align=center><table border=1 height=30 width=500 bgcolor=gray>
<tr>
<td>ID:</td>
<td>ОТ:</td>
<td>ЗА:</td>
<td>ПЕСЕН/ПОЗДРАВ:</td>
</tr>";
while ($r = mysql_fetch_array($result)) {
    $id = $r['id'];
    $ot = $r['ot'];
    $izp = $r['izp'];
    $pesen = $r['pesen'];
    echo"<tr>
<td>$id</td>
<td>$ot</td>
<td>$izp</td>
<td>$pesen</td>
</tr>";
}
echo"<tr>
<td>ID:</td>
<td>ОТ:</td>
<td>ЗА:</td>
<td>ПЕСЕН/ПОЗДРАВ:</td>
</tr>
</table>";
echo '<br /><br />
    <a
        href="pravila.php"
        target="_self" rel="author"
        title="Правила за поздравления"
        onmouseover= "this.src = \'pravila1.png\'"
        onmouseout= "this.src = \'pravila2.png\'">
    <img src="pravila2.png"
        border="0"
        title="Правила за поздравления"
        alt="Правила за поздравления"
        onmouseover= "this.src = \'pravila1.png\'"
        onmouseout= "this.src = \'pravila2.png\'" /><br />Правила за поздравления</a><br /><br />
    <a
        href="add.php"
        target="_self" rel="author"
        title="Добави поздрав">
		Добави поздрав</a></div>';
