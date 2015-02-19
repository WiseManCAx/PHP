<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Problem 2. Rich People’s Problems</title>
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        <form action="02.CarRandomizer.php" method="post">
            <label>Enter cars</label>
            <input type="text" name="cars">
            <input type="submit" name="submit" value="Show result">
        </form>
        <?php
        if (isset($_POST['cars']) && $_POST['cars'] !== ''):
            $cars = explode(', ', htmlspecialchars($_POST['cars']));
            $colors = array('yellow', 'red', 'blue', 'green', 'silver');
            ?>
            </br>
            <table>
                <tr>
                    <th>Car</th>
                    <th>Color</th>
                    <th>Count</th>
                </tr>
                <?php
                foreach ($cars as $car):
                    ?>
                    <tr>
                        <td><?php echo $car; ?></td>
                        <td>
                            <?php
                            $colorIndex = rand(0, 4);
                            echo $colors[$colorIndex];
                            ?>
                        </td>
                        <td>
                            <?php
                            $count = rand(1, 5);
                            echo $count;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </body>
</html>