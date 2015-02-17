<center>Генериране на таблица с произволен брой редове</center>
<center>(Докато не се генерира: 2015 или генерациите са не повече от 20)</center><br>
<table border="3" cellspacing="0" cellpadding="0" width="333px" height="30px" align=center valign=middle>
    <th>WiseMan CAx:</th>
    <?php
    $i = 1975;
    $ii = 1;
    while ($i != 2015 && $ii < 21) {
        echo '<tr><td><center>Номерът е ' . $i . ' --- Брой на повторенията: ' . $ii . '</center><td/></tr>';
        $i = rand(2000, 2021);
        $ii++;
    }
    ?>
</table>