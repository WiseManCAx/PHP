<?php

$a = 2;
while ($a != 5) {
    $a = rand(1, 10);
    echo $a . '<br>';
}
echo '<hr>';


do {
    $a = rand(1, 10);
    echo $a . '<br>';
} while ($a != 5);
