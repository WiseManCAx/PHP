<form action="post_get_table.php" method="post">
    <input type="text" name="rows">
    <input type="text" name="cows">
    <input type="submit" value="Go">
</form>


<?php

if($_POST['rows']=(int)$_POST['rows'])
    {
echo 'Колоните са въведени като число: '.$_POST['rows'].'<br>';
if($_POST['cows']=(int)$_POST['cows'])
    {
echo 'Редовете са въведени като число: '.$_POST['cows'].'<br><br>';
echo '<table border=1>';
for ($i = 0; $i < $_POST['rows']; $i++) {
    echo '<tr>';
    $z = $i + 1;
    for ($y = 0; $y < $_POST['cows']; $y++) {
        $zz = $y + 1;
        echo '<td><center>' . $z . ' = ' . $zz . '</center></td>';
    }
    echo '</tr>';
}
echo '</table>';
    }
    }
else
    {
echo "Моля, в двете полета въведете само числа.";
    }
    ?>