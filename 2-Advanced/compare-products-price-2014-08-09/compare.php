<?php

include('database.php');
$type = trim($_REQUEST['type']);
$res = '';
$res = "<table cellspacing='2' cellpadding='0' align='left' width='200'>
<tr><th align='left'><strong>Product Attributes</strong></th></tr>
<tr height='75' align='center'><td align='left'>Product Image</td></tr>
<tr height='40' align='center'><td align='left'>Company Name</td></tr>
<tr height='40' align='center'><td align='left'>Size</td></tr>
<tr height='40' align='center'><td align='left'>Price</td></tr>
<tr height='40' align='center'><td align='left'>Color</td></tr>
<tr height='40' align='center'><td align='left'>Shape</td></tr>
<tr height='40' align='center'><td align='left'>Weight</td></tr>
</table>";
if ($type == 'detail') {
    $pid = explode('-', trim($_REQUEST['p_id']));
    $id = $pid['1'];

    $sql = mysql_query("SELECT * FROM compare where id=$id") OR die(mysql_error());
    $data = mysql_fetch_assoc($sql);
    $res .="<table cellspacing='2' cellpadding='0' align='left' width='240'>
<tr><th align='left'><strong>Product Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='image/" . $data['image'] . "' width='75px' height='75px'></td></tr>
<tr height='40' align='center'><td align='left'>" . $data['company'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['size'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['price'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['color'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['shape'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['weight'] . "</td></tr>";
    $res .= "</table>";
} else if ($type == 'compare') {
    $Totalpids = (array) json_decode(stripslashes($_REQUEST['pids']));
    foreach ($Totalpids as $product) {
        $sql = mysql_query("SELECT * FROM compare where id=" . $product->pid . "");
        $data = mysql_fetch_assoc($sql);
        $res .="<table cellspacing='2' cellpadding='0' align='left' width='240'>
<tr><th align='left'><strong>Product Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='image/" . $data['image'] . "' width='75px' height='75px'></td></tr>
<tr height='40' align='center'><td align='left'>" . $data['company'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['size'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['price'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['color'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['shape'] . "</td></tr>
<tr height='40' align='center'><td align='left'>" . $data['weight'] . "</td></tr>";
        $res .= "</table>";
    }
}
echo $res;