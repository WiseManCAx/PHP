<?php
$download = 'database.txt';
if (isset($_POST['submit'])) {
    echo "it's alive";
    echo '<pre>' . print_r($_FILES, true) . '</pre>';
} else {
    echo "it's not";
    echo '<pre>' . print_r($_FILES, true) . '</pre>';
    unset($_FILES);
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="user_name">
    <input type="file" name="upload">
    <input type="submit" value="submit">
</form>