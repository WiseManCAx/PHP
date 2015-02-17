<table border="3" cellspacing="0" cellpadding="0" width="333px" height="30px" align=center valign=middle>
    <th>WiseMan CAx:</th>
    // Генериране на таблица с произволен брой редове
    <?php
    $i = 1975;
    $ii = 1;
    while ($i != 2015) {
        echo '<tr><td><center>Номерът е ' . $i . ' --- Брой на повторенията: ' . $ii . '</center><td/></tr>';
        $i = rand(2000, 2021);
        $ii++;
    }
    echo '<tr><td><center>Номерът е ' . $i . ' --- Брой на повторенията: ' . $ii . '</center><td/></tr>';
    ?>
</table>