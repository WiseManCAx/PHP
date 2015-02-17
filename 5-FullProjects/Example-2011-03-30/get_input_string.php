<?php

function GetInputString($name, $default_value = "", $format = "GPCS") {

    //order of retrieve default GPCS (get, post, cookie, session);

    $format_defines = array(
        'G' => '_GET',
        'P' => '_POST',
        'C' => '_COOKIE',
        'S' => '_SESSION',
        'R' => '_REQUEST',
        'F' => '_FILES',
    );
    preg_match_all("/[G|P|C|S|R|F]/", $format, $matches); //splitting to globals order
    foreach ($matches[0] as $k => $glb) {
        if (isset($GLOBALS[$format_defines[$glb]][$name])) {
            return $GLOBALS[$format_defines[$glb]][$name];
        }
    }

    return $default_value;
}