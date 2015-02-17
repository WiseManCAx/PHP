<?php

function JapaneseCalendar($unix_time, $gmt,
                          $monthsystem = 0) {

$months[0]['name'] = array(
    'ichigatsu','nigatsu','sangatsu',
    'shigatsu','gogatsu','rokugatsu',
    'shichigatsu','hachigatsu','kugatsu',
    'j?gatsu','j?ichigatsu','j?nigatsu');

$months[0]['cause'] = array(
    'first month',
    'second month',
    'third month',
    'forth month',
    'fifth month',
    'six month',
    'seventh month',
    'eighth month',
    'ninth month',
    'tenth month',
    'elventh month',
    'twelve month');

$months[1]['name'] = array(
    'mutsuki','kinusaragi','yayoi',
    'uzuki','satsuki','minatsuki',
    'fumizuki','hazuki','nagatsuki',
    'kaminazuki','shimotsuki','shiwasu');

$months[1]['cause'] = array(
    'affection month',
    'changing clothes',
    'new life',
    'u-no-hana month',
    'fast month',
    'month of water',
    'book month',
    'leaf month',
    'long month',
    'month of gods',
    'frost month',
    'priests run');

$days['roman'] = array(
    'nichiy?bi','getsuy?bi','kay?bi',
    'suiy?bi','mokuy?bi','kin\'y?bi','doy?bi');
$days['element'] =
   array('Sun','Moon','Fire','Water',
   'Wood','Gold','Earth');
$days['day'] = array(
   'tsuitachi','futsuka','mikka','yokka',
   'itsuka','muika','nanoka','y?ka',
   'kokonoka','t?ka','j?ichinichi',
   'j?ninichi','j?sannichi','j?yokka',
   'j?gonichi','j?rokunichi',
   'j?shichinichi','j?hachinichi',
   'j?kunichi','hatsuka',
   'nij?ichinichi','nij?ninichi',
   'nij?sannichi','nij?yokka',
   'nij?gonichi','nij?rokunichi',
   'nij?shichinichi','nij?hachinichi',
   'nij?kunichi','sanj?nichi',
   'sanj?ichinichi');

return  array("date"=>$days['roman'][date('w', $unix_time)].' '.
   $days['day'][date('d', $unix_time)-1].' '.
   $months[$monthsystem]['name'][date('n', $unix_time)-1].
   ' '.date('Y', $unix_time),"cause" =>
   $days['element'][date('w', $unix_time)].
   ' '.$months[$monthsystem]['cause'][date('n', $unix_time)-1],
   "time" => date('h:i:s A', $unix_time));
}

?>