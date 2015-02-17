<?php

$diameter = 4.0;
$pi = 3.14;
$title = "Circle";

echo "<html> <head> <title> $title </title> </head> <body>";

function circleArea($diameter, $pi) { //Izbirane mejdu radius i diametyr s kliu4ove
    $area = $diameter * $pi;
    return $area;
}

echo circleArea($diameter, $pi);
echo "<br /><br /></body> </html>";

function calculateAreaOfCircle($number = 1, $type = 'radius') {
    if (!is_numeric($number) || $number <= 0)
        return -1;

    // what type of number is it?
    switch ($type) {
        case 'radius':
        default:
            $radius = $number;

            break;

        case 'diameter':
            $radius = $number / 2;

            break;
    }

    return pow($radius, 2) * M_PI;
}

echo "what is the area for the radius of 25?";
echo "<br />";
echo(calculateAreaOfCircle(25));
echo "<br /><br />";

echo "what is the area for the diameter of 30?";
echo "<br />";
echo(calculateAreaOfCircle(30, 'diameter'));
echo "<br /><br />";
?>