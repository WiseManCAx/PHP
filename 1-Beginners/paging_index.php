<?php

echo "PHP simple paging<br />
<a href=\"PHP_simple_paging_index.zip\">Download source</a><br /><br /><br />";

$ar = array("element1", "element2", "element3", "element4", "element5", "element6", "element7");
$el_na_stranica = 3;

if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;

$reji_ot_elem = ($el_na_stranica * $page) - $el_na_stranica;
$sm = array_slice($ar, $reji_ot_elem, $el_na_stranica);
foreach ($sm as $l)
    echo $l . "<br /><br /><br />";


for ($x = 1; $x <= ceil(count($ar) / $el_na_stranica); $x++) {
    if ($x == $page) {
        echo "$x&nbsp;";
        continue;
    }
    echo ("<a href=\"PHP_simple_paging_index.php?page=$x\">$x</a>&nbsp;");
}
?>