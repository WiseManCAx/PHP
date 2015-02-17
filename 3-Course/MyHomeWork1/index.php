<?php
session_start();
$pageTitle = 'Списък';
include 'includes/header.php';

if ($_POST) {
    $selectedGroup = 0;
    $selectedGroup = (int) $_POST['filter'];
}
if (isset($_POST['deleted']) && $_POST['deleted'] == true) {
    echo '<div id="success-message">';
    echo '<p>Item successfully deleted.</p>';
    echo '</div>';
}
?>
<form class="form" method ="POST">



    <select name="date">
        <?php
        if (isset($_POST['date']) && !empty($_POST['date'])) {
            $selectDate = $_POST['date'];
        } else {
            $selectDate = 'All';
        }

        if (file_exists('data.txt')) {
            $fileContent = file('data.txt');
            $allDates = array();

            foreach ($fileContent as $value) {
                $columns = explode('!', $value);
                $allDates[] = $columns[0];
            }

            $uniqueDates = array_unique($allDates);
            array_unshift($uniqueDates, 'All');

            foreach ($uniqueDates as $value) {
                if ($value == $selectDate) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                echo '<option value="' . $value . '"' . $selected . '>' . $value . '</option>';
            }
        }
        ?>
    </select>





    <select name="filter">
        <?php
        echo '<option value = "0">Всички</option>';
        foreach ($groups as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Филтрирай" />
</form>
<center>
    <table class="pretty">
        <tr>
            <td>No.</td>
            <td>Дата</td>
            <td>Име</td>
            <td>Сума</td>
            <td>Вид</td>
            <td>Редактирай</td>
            <td>Изтрий</td>
        </tr>
        <?php
        if (file_exists('data.txt')) {
            $result = file('data.txt');
            $selectedGroup = 0;
            if ($_POST) {
                $selectedGroup = (int) $_POST['filter'];
            }
            $sum = 0;
            $numberColumns = 0;
            $row = -1;
            foreach ($result as $keyName => $value) {
                $row++;
                $columns = explode('!', $value);
                if (count($columns) < 4) {
                    continue;
                }
                if (($selectDate != 'All') && ($selectDate != $columns[0])) {
                    continue;
                }
                if ($selectedGroup != $columns[3] && $selectedGroup != 0) {
                    continue;
                }
                $numberColumns++;
                $sum += (float) $columns[2];
                echo '<tr>
                <td>' . $numberColumns . '</td>
                <td>' . $columns[0] . '</td>
                <td>' . $columns[1] . '</td>
                <td>' . number_format($columns[2], 2) . ' лв.</td>
                <td>' . $groups[trim($columns[3])] . '</td>
                <td><form method="POST" action="form.php">
            <input type="hidden" name="indexForEdit" value="' . $keyName . '">
            <input class="buttonSmall" type="submit" value="Редактирай">
            </form></td>
                <td><form method="POST" action="deleteData.php">
            <input type="hidden" name="indexForDelete" value="' . $keyName . '">
            <input class="buttonSmall" type="submit" value="Изтрий">
        </form></td>
                </tr>';
            }
            echo '<tr>
                <td>No.</td>
                <td>Дата</td>
                <td>Име</td>
                <td>Общо: ' . number_format($sum, 2) . ' лв.</td>
                <td>Вид</td>
                <td>Редактирай</td>
                <td>Изтрий</td>
                </tr>';
        }
        ?>
    </table>
</center>
<?php
include 'includes/footer.php';
?>