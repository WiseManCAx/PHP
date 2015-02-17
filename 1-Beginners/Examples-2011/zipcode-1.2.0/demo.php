<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Zip Code Range and Distance Calculation Demo</title>
   <style type="text/css" lang="en">
   BODY, P { font-family: sans-serif; font-size: 9pt; }
   H3 { font-family: sans-serif; font-size: 14pt; }
   </style>
</head>
<body>

<?php

/*  
   DEMO for using the zipcode PHP class. By: Micah Carrick 
   Questions?  Comments?  Suggestions?  email@micahcarrick.com
*/

require_once('zipcode.class.php');      // zip code class


// Open up a connection to the database.  The sql required to create the MySQL
// tables and populate them with the data is in the /sql subfolder.  You can
// upload those sql files using phpMyAdmin or a MySQL prompt.  You will have to
// modify the below information to your database information.  
mysql_connect('localhost','php_user','php_user') or die(mysql_error()); 
mysql_select_db('test') or die(mysql_error()); 



// Below is an example of how to calculate the distance between two zip codes.

echo '<h3>A sample calculating the distance between 2 zip codes: 93001 and 60618</h3>';

$z = new zipcode_class;
$miles = $z->get_distance(97214, 98501);

if ($miles === false) echo 'Error: '.$z->last_error;
else echo "Zip code <b>97214</b> is <b>$miles</b> miles away from <b>98501</b>.<br />";



// Below is an example of how to return an array with all the zip codes withing
// a range of a given zip code along with how far away they are.  The array's
// keys are assigned to the zip code and their value is the distance from the
// given zip code.  

echo '<h3>A sample getting all the zip codes withing a range: 2 miles from 97214</h3>';

$zips = $z->get_zips_in_range('97214', 2, _ZIPS_SORT_BY_DISTANCE_ASC, true); 


if ($zips === false) echo 'Error: '.$z->last_error;
else {
   
   foreach ($zips as $key => $value) {
      echo "Zip code <b>$key</b> is <b>$value</b> miles away from <b>97214</b>.<br />";
   }
   
   // One thing you may want to do with this is create SQL from it. For example, 
   // iterate through the array to create SQL that is something like:
   // WHERE zip_code IN ('93001 93002 93004')
   // and then use that condition in your query to find all pizza joints or 
   // whatever you're using it for. Make sense? Hope so.
   
   echo "<br /><i>get_zips_in_range() executed in <b>".$z->last_time."</b> seconds.</i><br />";
}

// And one more example of using the class to simply get the information about
// a zip code.  You can then do whatever you want with it.  The array returned
// from the function has the database field names as the keys.  I just do a 
// couple string converstions to make them more readable.

echo '<h3>A sample getting details about a zip code: 97214</h3>';

$details = $z->get_zip_details('97214');

if ($details === false) echo 'Error: '.$z->last_error;
else {
   foreach ($details as $key => $value) {
      $key = str_replace('_',' ',$key);
      $key = ucwords($key);
      echo "$key:&nbsp;$value<br />";
   } 
}
?>

</body>
</html>