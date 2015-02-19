<?php
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    function isPrime($number) {
        if ($number < 2) {
            return false;
        }

        $maxDelimiter = sqrt($number);
        $isPrime = true;

        for ($delimiter = 2; $delimiter <= $maxDelimiter; $delimiter++) {
            if ($number % $delimiter == 0) {
                $isPrime = false;
                break;
            }
        }

        return $isPrime;
    }

    $numbers = array();

    for ($number = $start; $number <= $end; $number++) {
        if (isPrime($number)) {
            $numbers[] = "<strong>$number</strong>";
        } else {
            $numbers[] = $number;
        }
    }

    $result = implode(', ', $numbers);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Problem 4. Find Primes in Range</title>
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        <form action="04.PrimesInRange.php" method="post">
            <label>Starting index: </label>
            <input type="text" name="start">
            <label>End: </label>
            <input type="text" name="end">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php if (isset($_POST['submit'])) : ?>
            <div class="container">
                <?php echo $result; ?>
            </div>
        <?php endif ?>
    </body>
</html>