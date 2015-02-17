<?php

/*
|--------| Copyright |----------------------------------|
|TagCloud-a-like script v1.1                            |
|Copyright (c) 2008 Sasha Khamkov                       |
|http://www.sanusart.com                                |
|mail@sanusart.com, scamme@gmail.com                    |
|                                                       |
|--------| Usage |--------------------------------------|
|Add links to the "$array" in the predefined structure. |
|Use "include('cloud.php')" to call the script.         |
|-------------------------------------------------------|
*/


$min = '8'; // Minimum font size in pixel.
$max = '22'; // Maximum font size in pixel.
$decor = 'text-decoration:none;font-weight:100;'; // Inline CSS per link.

$array = array(
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="downloads.php">Downloads</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#1">Link1</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#2">Link2</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#3">Link3</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#4">Link4</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#5">Link5</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#6">Link6</a>',
'<a style="'.$decor.'font:normal '.rand($min,$max).'px tahoma,sans-serif;font" href="#7">Link7</a>'
// Add as many links as you like.

);

shuffle($array); // This will asure link random appearance.
ksort($array);
foreach ($array as $key => $val)
  {
    echo "$val ";
  }
?>