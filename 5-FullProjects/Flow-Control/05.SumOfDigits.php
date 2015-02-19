<?php
if (isset($_POST['submit'])) {

    function sumDigits($number) {
        if (ctype_digit($number)) {
            $digits = str_split($number);
            $result = array_sum($digits);
        } else {
            $result = 'I cannot sum that';
        }

        return $result;
    }

    $numbers = explode(', ', $_POST['numbers']);
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
        <form action="05.SumOfDigits.php" method="post">
            <label>Input string: </label>
            <input type="text" name="numbers">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php if (isset($_POST['submit'])): ?>
            <table>
                <?php
                foreach ($numbers as $number):
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($number); ?></td>
                        <td>
                            <?php
                            echo sumDigits($number);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif ?>
    </body>
</html>