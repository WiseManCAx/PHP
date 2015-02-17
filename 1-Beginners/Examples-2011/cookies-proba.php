<?php

session_start();
if ($_SESSION['isLogged'] == 'WiseMan CAx') {
    echo $_SESSION['isLogged'];
    // It is logged and Go to Logged page;
} else {
    // It is NOT logged and Go to Public page;
}