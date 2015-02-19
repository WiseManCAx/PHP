<?php
include_once('dbconnect.php');
if (empty($_POST['scaninput']) == FALSE) {
    $barcode = htmlentities($_POST['scaninput']);
    //checking if the barcode exist in the database 
    $barcode_check = $conn->query("select * from barcode where barcode='$barcode'");
    //extracting the status of the item
    if ($barcode_check->rowCount() > 0) {
        while ($row = $barcode_check->fetch(PDO::FETCH_OBJ)) {
            $status = $row->status;
        }
    }
    if ($barcode_check->rowCount() > 0 && $status == 'Valid') {
        //updating the database table barcode for the iterm is sold to a customer 
        $sell = $conn->exec("UPDATE barcode SET status='Invalid' where barcode= '$barcode'");
        if ($sell > 0) {
            echo "<script> alert('Successfully sold');</script>";
        }
    } else if ($barcode_check->rowCount() > 0 && $status == 'Invalid') {
        echo "<script> alert('Item Allready Sold (Imesha Uzika)');</script>";
    } else {
        echo "<script> alert('Item Not present....');</script>";
    }
} else {
    echo "<script> alert('Please Scan something.....');</script>";
}
?>

<html>
    <head>
        <title>Barcode Generator</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <div>
                <h1>Simple Barcode Generator</h1>
            </div>
            <div>
                <form action="index.php"  method="post">
                    <label>ITEM BARCODE</label>
                    <input type="text" name="scaninput" onfocus="ON" autocomplete="OFF" />
                </form>
            </div>
        </div>
    </body>
</html>