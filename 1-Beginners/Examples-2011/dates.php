<?php
// 1241177019
// Gatakka Е създал този урок на 2009 : 05 : 01 в 01:23:39
$format_time_gatakka = 1241177019;
$TIME = 'Y : m : d в h:i:s';
echo 'Gatakka Е създал този урок на ';
echo date($TIME, $format_time_gatakka);
echo '<br><br><hr><br>';

echo date('Y : m : d');

echo '<br><br><hr><br>';

echo 'Предаване на същия формат време, но като параметър - за база данни и с добавени час=минута=секунда <br>';
$TIME = 'Y : m : d === h:i:s';
echo date($TIME);

echo '<br><br><hr><br>';

echo 'Форматираното време според лятното часово време в България <br>';
$TIME = 'Y : m : d === h:i:s';
/*
  time() - Дава Юникс Тайм Щамп времето - за да сравним две дати е достатъчно да ги превърнен в
  това 'време' и да ги извадим една от друга...
  echo date('U'); - Дава същия резултат като по-горната функция, но е значително по-бавно и силно НЕпрепоръчително.
 */
$_set_time = time() + 3600;
echo date($TIME, $_set_time);

echo '<br><br><hr><br>';

echo 'Форматирано часово време, но с един ден напред... <br>';
$format = 'Y : m : d === h:i:s';
$_set_format_time = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$_set_format_time+=86400;
echo date($format, $_set_format_time);

echo '<br><br><hr><br>';

echo 'Форматирано часово време от стринг - 2011-04-14 0:0:0 <br>';
$format = 'Y : m : d === h:i:s';
$_set_string = strtotime("2011-04-14 0:0:0");
echo date($format, $_set_string);
