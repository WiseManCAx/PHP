<?php
$_input_radius = 4; // Въведи радиус за пресмятане на площта;

$_take_area = area($_input_radius); // Присвоява изчислената площ;
echo $_take_area;

function area($radius, $pi = 3.14) {
    echo 'Площта е ';
    return $pi * ($radius * $radius); // Връщане на стойността в приложението;
}
