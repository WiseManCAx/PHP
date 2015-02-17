<?php
$_kivi = 'Киви';
$fruits_west = array(1 => 'Банан', 2 => 'Лимон', 3 => 'Мандарина', 4 => 'Портокал', 5 => $_kivi);
$fruits_bg = array(1 => 'Ябълка', 2 => 'Круша', 3 => 'Слива');
$fruits[1] = $fruits_west;
$fruits[2] = $fruits_bg;

foreach ($fruits as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $k_key => $v_value) {
            echo $k_key . '===' . $v_value . '<br>';
        }
        echo '<hr><br>';
    } else {
        echo '<hr><br>';
        echo $key . '===' . $value . '<br>';
    }
}