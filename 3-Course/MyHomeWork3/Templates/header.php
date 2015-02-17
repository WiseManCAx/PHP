<?php
require_once 'session_var.php';
require_once 'constants.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Header -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $pageTitle; ?></title>
        <link href="./Img/Icons/myIcon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="./CSS/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="./CSS/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./CSS/bootstrap-responsive.min.css">
        <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="./JS/bootstrap.min.js"></script>
        <SCRIPT LANGUAGE="JavaScript" SRC="./JS/CalendarPopup.js"></SCRIPT>
        <SCRIPT LANGUAGE="JavaScript">
            var cal = new CalendarPopup();
        </SCRIPT>
        <!-- end of Header -->
    </head>
    <body>
        <!-- Content -->