<?
/*
 Name: config.inc.php Date started: 03/12/24 
 Author: Kane N., kneuf.com
 Simple Errors, overrides default Apache Server error pages
 Copyright (C) 2003  Kane N., kneuf.com
 Version: 0.1 BETA

    Simple Errors is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
//Simple Errors Variables File
//edit below this line
//set the following to: 1 = yes, 0 = no
$log_on_error = 1; // set to 1 if you want to save the errors to a file, 0 if not. Note: you must fill out the $error_file variable default 1 
$email_on_error = 0; // set to 1 if you want the script to email a report when an error occurs, 0 if not. Note: you must be able to send out mail from your server and fill in the following variables. default 1
$show_errors = 1; // 1 = show debugging info, 0 = don't show debug info. default 0
$show_header = 1; // 1 = show header (specify file above, 0 = don't display header. default 0
$show_footer = 1; // 1 = show footer (specify file above, 0 = don't display footer. default 0
//rest need data to be filled in
$main_site = "http://www.kneuf.com"; // your home page URL
$log_file = "/full/system/path/to/error_type.log"; // the absolute server  path to the errors file (that contains the error codes and text, etc)
$error_file = "/full/system/path/to/error_log.log"; // the absolute server path to the errors log file (that contains the log and when each error occurred)
$header = "/full/system/path/to/header.txt"; // if $show_header is set to 1, specify the absolute server path to the header file location here
$footer = "/full/system/path/to/footer.txt"; // if $show_footer is set to 1, specify the absolute server path to the footer file location here
$to = ""; // fill in the email address you want the report sent to
//nothing else to edit beyond this line
$version = "0.1";
?>