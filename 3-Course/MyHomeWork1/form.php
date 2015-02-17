<?php
session_start();
mb_internal_encoding('UTF-8');
$pageTitle = 'Форма';
include 'includes/header.php';
$currentDate = date('d.m.Y');
$LineNumber = $_POST['indexForEdit'];

if (isset($_POST['indexForEdit'])) {
    $LineNumber = $_POST['indexForEdit'];
    $MustBeEdited = true;
}
if ($MustBeEdited) {
    $ProductsList = file('data.txt');
    // echo '<pre>' . print_r($_POST['indexForEdit'], true) . '</pre>';
    $editData = explode('!', $ProductsList[$_POST['indexForEdit']]);
    // echo '<pre>' . print_r($editData, true) . '</pre>';
    $SubmitValue = 'Редактирай стария запис';
    $dateValue = trim($editData[0]);
    // echo "<p>$dateValue - Редактиране</p>";
    $textValue = $editData[1];
    // echo "<p>$textValue - Редактиране</p>";
    $PriceValue = $editData[2];
    // echo "<p>$PriceValue - Редактиране</p>";
} else {
    $SubmitValue = 'Добави новия разход';
    $textValue = '';
    // echo "<p>$dateValue</p>";
    $PriceValue = '';
    // echo "<p>$textValue</p>";
    $dateValue = '';
    // echo "<p>$PriceValue</p>";
}

if ($_POST) {
    if (!$MustBeEdited) {
        $name = trim($_POST['name']);
        $name = str_replace('!', '', $name);
        $cost = trim($_POST['cost']);
        $cost = (float) str_replace('!', '', $cost);
        $selectedGroup = (int) $_POST['group'];
        $error = false;
        if (mb_strlen($name) < 3) {
            echo '<p>Името е прекалено късо.</p>';
            $error = true;
        }

        if (!$cost > 0) {
            echo '<p>Невалидна сума.</p>';
            $error = true;
        }
        if (!array_key_exists($selectedGroup, $groups)) {
            echo '<p>Невалидна група.</p>';
            $error = true;
        }
        $today = getdate();
        // echo '<pre>' . print_r($today, true) . '</pre>';
        if (!$error) {
            $result = $today['mday'] . '.' . $today['mon'] . '.' . $today['year'] . '!' . $name . '!' . $cost . '!' . $selectedGroup . "\r\n";
            if (file_put_contents('data.txt', $result, FILE_APPEND)) {
                echo '<p>Новият запис е съхранен във файла.</p>';
            }
        }
    }
}
?>
<a class="button" href ="index.php">Покажи списъка с разходите.</a>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="POST">
    <div>Име: <input type="text" name="name" value="<?php echo $textValue ?>" placeholder="Продукт" /></div>
    <div>Сума: <input type="text" name="cost" value="<?php echo $PriceValue ?>" placeholder="Цена (0.00 лв.)" /></div>
    <div>
        <span>Вид: </span>
        <select name="group">
            <?php
            foreach ($groups as $key => $value) {
                echo '<option value="' . $key . '">' . $value .
                '</option>';
            }
            ?>
        </select>           
    </div>
    <?php
    if ($MustBeEdited)
        echo '<div>Дата: <input type="text" name="date" value="' . $dateValue . '" placeholder="' . $currentDate . '" /></div>';
    echo '<div><input type="hidden" name="LineNumber" value="' . $LineNumber . '" /></div>';
    ?>
    <div><input type="submit" value="<?php echo $SubmitValue ?>" /></div>
</form>
<?php
include 'includes/footer.php';