<?php
session_start();

if ($_SESSION['$a'] > 12) {
    ?>
    <a href="session_start1.php">session end</a>;
    <?php
} else {
    $_SESSION['$a']+=1;
    echo $_SESSION['$a'];
// Инкрементирането работи;
}