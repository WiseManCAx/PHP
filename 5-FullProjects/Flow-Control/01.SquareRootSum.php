<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Problem 1. Square Root Sum</title>
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        <table>
            <tr>
                <th>Number</th>
                <th>Square</th>
            </tr>
            <?php
            $sum = 0;
            for ($number = 0; $number <= 100; $number += 2):
                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td>
                        <?php
                        $squareRoot = number_format(sqrt($number), 2);
                        $sum += $squareRoot;
                        echo $squareRoot;
                        ?>
                    </td>
                </tr>
            <?php endfor; ?>
            <tr>
                <td class="total">Total:</td><td><?php echo $sum; ?></td>
            </tr>
        </table>
    </body>
</html>