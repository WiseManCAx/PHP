<?php
if (isset($_POST['submit']) && $_POST['number'] > 0):
    $header[0] = 'Year';
    $year = (int) date('Y');
    for ($i = 1; $i <= 12; $i++):
        $date = mktime(0, 0, 0, $i, 1, $year);
        $mouth = getdate($date)['month'];
        $header[$i] = $mouth;
    endfor;
    $header[13] = 'Total';


    $n = $_POST['number'];
    for ($row = 0; $row < $n; $row++):
        for ($col = 1; $col <= 12; $col++):
            $expenses[$row][$col] = rand(0, 999);
        endfor;
        $sum = array_sum($expenses[$row]);
        $expenses[$row][13] = $sum;
        $expenses[$row][0] = $year;
        $year--;
    endfor;
endif
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Problem 3. Show Annual Expenses</title>
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        <form action="03.AnnualExpenses.php" method="post">
            <label>Enter number of years: </label>
            <input type="text" name="number">
            <input type="submit" name="submit" value="Show costs">
        </form>
        </br>
        <?php if (isset($_POST['submit']) && $_POST['number'] > 0): ?>
            <table>
                <tr>
                    <?php for ($i = 0; $i < 14; $i++): ?>
                        <th>
                            <?php echo $header[$i] ?>
                        </th>
                    <?php endfor ?>
                    </td>
                </tr>
                <?php foreach ($expenses as $row): ?>
                    <tr>
                        <?php for ($i = 0; $i < 14; $i++): ?>
                            <td>
                                <?php echo $row[$i]; ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>

            </table>
        <?php endif ?>

    </body>
</html>