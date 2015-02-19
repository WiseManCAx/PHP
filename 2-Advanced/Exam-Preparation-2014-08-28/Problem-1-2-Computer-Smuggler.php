<!DOCTYPE html>
<html>
    <head>
        <title>Nakov's Affairs</title>
    </head>
    <body>
        <form method="get" action="Problem 1.2 Computer-Smuggler.php">
            <label for="listParts">Parts:</label>
            <input id="listParts" type="text" name="list"/>
            <input type="submit"/>
        </form>
    </body>
</html>

<?php
//prices : CPU - 85lv. / ROM - 45lv / RAM - 35lv. / VIA - 45lv.

if (isset($_GET['list'])) {
    $products = $_GET['list'];
    $productsArray = explode(", ", $products);
    $CPUCount = 0;
    $RAMCount = 0;
    $VIACount = 0;
    $ROMCount = 0;

    foreach ($productsArray as $product) {
        switch ($product) {
            case 'CPU': $CPUCount++;
                break;
            case 'RAM': $RAMCount++;
                break;
            case 'ROM': $ROMCount++;
                break;
            case 'VIA': $VIACount++;
                break;
            default: //do nothing;
                break;
        }
    }
    $CPUPrice = 85;
    $RAMPrice = 35;
    $ROMPrice = 45;
    $VIAPrice = 45;

    if ($CPUCount >= 5) {
        $CPUPrice /= 2;
    }
    if ($RAMCount >= 5) {
        $RAMPrice /= 2;
    }
    if ($ROMCount >= 5) {
        $ROMPrice /= 2;
    }
    if ($VIACount >= 5) {
        $VIAPrice /= 2;
    }
    $expenses = $CPUCount * $CPUPrice + $RAMCount * $RAMPrice + $ROMCount * $ROMPrice + $VIACount * $VIAPrice;

    //this is how many computers could be assembled:
    $assembledComputers = min($CPUCount, $RAMCount, $ROMCount, $VIACount);

    //....
    $profitFromSoldPCs = $assembledComputers * 420;

    //this is how many parts we have left:
    $CPUCount -= $assembledComputers;
    $RAMCount -= $assembledComputers;
    $VIACount -= $assembledComputers;
    $ROMCount -= $assembledComputers;
    $partsLeft = $CPUCount + $RAMCount + $VIACount + $ROMCount;

    //....
    $profitFromPartsLeft = $CPUCount * 85 / 2 + $RAMCount * 35 / 2 + $ROMCount * 45 / 2 + $VIACount * 45 / 2;
    $profit = $profitFromSoldPCs + $profitFromPartsLeft;
    $balance = $profit - $expenses;

    echo "<ul><li>" . $assembledComputers . " computers assembled</li><li>" . $partsLeft . " parts left</li></ul>";

    if ($balance > 0) {
        echo "<p>Nakov gained " . $balance . " leva</p>";
    } else {
        echo "<p>Nakov lost " . $balance . " leva</p>";
    }
}