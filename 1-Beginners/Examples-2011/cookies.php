<?php
session_start();

$_SESSION['isLogged']='WiseMan CAx';
// $_SESSION['isLogged']++;
echo $_SESSION['isLogged'];

echo '<br><br>';
echo '<a href="cookies-proba.php">Go</a>';
?>