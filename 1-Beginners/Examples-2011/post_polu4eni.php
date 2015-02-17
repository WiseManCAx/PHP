<?php

echo '<pre>'.print_r($_POST,true).'</pre>';
/* $_POST - Една от малкото наистина глобални променливи
 * Предава информацията през Header
*/

echo '<hr><br>';
echo '<pre>'.print_r($_POST['UserName'],true).'</pre>';

echo '<hr><br>';
?>