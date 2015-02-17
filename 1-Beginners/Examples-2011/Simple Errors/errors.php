<?
include ("full/system/path/to/config.inc.php");
/*
 Name: errors.php Date started: 03/12/24 
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
if ($show_errors == 1) {
//if $show_errors is set to 1, check for them here
if (!$log_file) trigger_error("error types file setting <b>&#36;log_file</b> is not set", E_USER_ERROR);
if ($log_on_error==1){
if (!$error_file) trigger_error("error logs file setting <b>&#36;error_file</b> is not set", E_USER_ERROR);
if (!is_file($log_file)) trigger_error("<b>$log_file</b> doesn't exist", E_USER_ERROR);
if (!is_file($error_file)) trigger_error("<b>$error_file</b> doesn't exist");
}
if ($email_on_errors) {if (!$to) trigger_error("the &#36; variable is not set", E_USER_ERROR);}
if ($show_header==1) {if (!$header) { trigger_error("&#36;header variable is not set"); }}
if ($show_footer==1) {if (!$footer) { trigger_error("&#36;footer variable is not set"); }}
}
function get_error($error_code=FALSE) {
//our great function, called get_error(); or get_error(error #); ex get_error(404);
global $log_file,$error_file,$email_on_error,$log_on_error,$to,$main_site;
//the globals, so we can access info from outside the function
$file_contents = file($log_file);

foreach($file_contents as $value)  
{
//loop through the file containing codes and such and assign to an array
$temp = explode('|', trim($value));
$users[$temp[0]]['code'] = $temp[0]; 
$users[$temp[0]]['title'] = $temp[1]; 
$users[$temp[0]]['sub'] = $temp[2];
$users[$temp[0]]['text'] = $temp[3];
}
//some server set variables here
$time = date(r); //returns server time in RFC 822 format
$ip = $_SERVER["REMOTE_ADDR"]; //the users IP, if any
$page = $_SERVER["REQUEST_URI"]; //the requested page that made the error
$agent = $_SERVER["HTTP_USER_AGENT"]; //the users browser (agent)
$ref = $_SERVER["HTTP_REFERER"]; //the refering page, if any
if (!$ref) { $ref = "N/A"; } //if they didn't come from a refering page, say so
if (!$ip) { $ip = "N/A"; } //if, for some reason, the $ip variable is not set, say so 
if ($error_code == FALSE) { $error_code = $_SERVER["QUERY_STRING"]; } //if the function was called like get_error(); read the error code from the query string
$error['code'] = $users[$error_code]['code'];
$error['title'] = $users[$error_code]['title'];
$error['sub'] = $users[$error_code]['sub'];
$error['text'] = $users[$error_code]['text'];
//heres some of the template functions
$error = str_replace("{page}", $page, $error); //replace all instances of {page} with the $page variable
$error = str_replace("{ip}", $ip, $error); //replace all instances of {ip} with the $ip variable
$error = str_replace("{agent}", $agent, $error); //replace all instances of {agent} with the $agent variable 
$error = str_replace("{ref}", $ref, $error); //replace all instances of {ref} with the $ref variable
$error = str_replace("{time}", $time, $error); //replace all instaces of {time} with the $time variable
$error_text = "$error[code] || $time || $page || $ip || $agent || $ref\n"; //the line that will be written in the error log file
$email_text = "
This is an automatic mailing from $main_site.
There was an error on your site. Here is the report:
-------------------
error: $error[code]
$error[text]
time: $time
page: $page
ip: $ip
browser: $agent
referer: $ref
-------------------
Powered by Simple Errors by kneuf!
        ----
http://www.kneuf.com
-------------------
"; //the message that gets sent if the option is elected
if ($log_on_error==1) { //if $log_on_error is set to 1, then lets do so!
$handle = fopen($error_file,"a"); //open the file in append mode
fwrite($handle, $error_text); //write to the file
fclose($handle); //close the file
}
if ($email_on_error==1){ //if $email_on_error is set to 1, then lets email!
mail($to, "$error[code] error on your site - Simple Errors", $email_text, "From: $to\r\n"."Reply-To: $to\r\n"."X-Mailer: Simple Errors - PHP/" . phpversion()); //the function that will send out the email
}
return $error; //return the array $error
}
$error = get_error();
//the following HTML code can be edited, but the kneuf.com link info must remain
?>
<html>
<head>
<title><?=$error['title'];?></title>
<style>
.error_code { font: bold; font-size: 32px; font-family: Arial Bold }
.error_sub { font: bold; font-size: 24px; color: red; font-family: Times New Roman }
.error_text { font-size: 12px; font-family: Arial; }
A:link { text-decoration: none; color: green}
A:visited { text-decoration: none; color: green}
A:hover { text-decoration: overline underline }
#kneuf_link { font-size: 10px;}
</style>
</head>
<body bgcolor="lightblue">
<? if ($show_header==1){include($header);} //if $show_header is set to 1, include it ?>
<table bgcolor="lightblue" width="300"><tr><td>
<p class="error_code"><?=$error['code'];?></p>
<p class="error_sub"><b><?=$error['sub'];?></b></p>
<p class="error_text"><?=$error['text'];?><br><? echo "Please hit your <a href=\"javascript:history.go(-1)\">back button</a> or return to the <a href=$main_site>main page</a>.";?></p>
</td></tr>
</table>
<? if ($show_footer==1){include($footer);} //if $show_footer is set to 1, include it ?>
<p><a id="kneuf_link" href="http://www.kneuf.com" title="powered by Simple Errors v. <?=$version;?> from kneuf!"><center>powered by Simple Errors v. <?=$version;?> from kneuf!</center></a></p>
</body></html>