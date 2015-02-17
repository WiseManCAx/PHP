<?php
$_kivi = 'Киви';
$fruits_west = array(1 => 'Банан', 2 => 'Лимон', 3 => 'Мандарина', 4 => 'Портокал', 5 => $_kivi);
$fruits_bg = array(1 => 'Ябълка', 2 => 'Круша', 3 => 'Слива');
$fruits[1] = $fruits_west;
$fruits[2] = $fruits_bg;

echo $fruits_west[3] . '<br>';
echo $fruits_bg[1] . '<br>';

echo '<hr>';
var_dump($fruits_bg); //Не показвай този променлива в оригинален код - изтрий я.

echo '<hr>';
echo '<table border="3" cellspacing="0" cellpadding="0" width="230px" height="30px" align=center valign=middle>';
echo '<th>WiseMan CAx</th>';

for ($i = 1; $i <= count($fruits_west); $i++) {
    echo '<tr><td><center>The fruits is ' . $fruits_west[$i] . '</center><td/></tr>';
}
echo '</table>';

echo '<br><br><hr><br>';
$friends[1] = 'Петър';
$friends[2] = 'Койчо';
$friends[3] = 'Румяна';

echo '<hr>';
echo '<table border="3" cellspacing="0" cellpadding="0" width="230px" height="30px" align=center valign=middle>';
echo '<th>WiseMan CAx</th>';

for ($i = 1; $i <= count($friends); $i++) {
    echo '<tr><td><center>My friends is ' . $friends[$i] . '</center><td/></tr>';
}
echo '</table>';

echo '<hr><br>';
echo 'Друг вариант за показване/извеждане на съдържание на масив:';
echo '<pre>' . print_r($friends, true) . '</pre>';
echo 'Друг вариант за показване/извеждане на съдържание на Многомерен масив:';
echo '<pre>' . print_r($fruits, true) . '</pre>';
?>