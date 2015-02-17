<?php

function CAST_TO_INT($var, $min = FALSE, $max = FALSE) {
    $var = is_int($var) ? $var : (int) (is_scalar($var) ? $var : 0);
    if ($min !== FALSE && $var < $min)
        return $min;
    elseif ($max !== FALSE && $var > $max)
        return $max;
    return $var;
}

function CAST_TO_FLOAT($var, $min = FALSE, $max = FALSE) {
    $var = is_float($var) ? $var : (float) (is_scalar($var) ? $var : 0);
    if ($min !== FALSE && $var < $min)
        return $min;
    elseif ($max !== FALSE && $var > $max)
        return $max;
    return $var;
}

function CAST_TO_BOOL($var) {
    return (bool) (is_bool($var) ? $var : is_scalar($var) ? $var : FALSE);
}

function CAST_TO_STRING($var, $length = FALSE) {
    if ($length !== FALSE && is_int($length) && $length > 0)
        return substr(trim(is_string($var) ? $var : (is_scalar($var) ? $var : '')), 0, $length);

    return trim(
            is_string($var) ? $var : (is_scalar($var) ? $var : ''));
}

function CAST_TO_ARRAY($var) {
    return is_array($var) ? $var : is_scalar($var) && $var ? array($var) : is_object($var) ? (array) $var : array();
}

function CAST_TO_OBJECT($var) {
    return is_object($var) ? $var : is_scalar($var) && $var ? (object) $var : is_array($var) ? (object) $var : (object) NULL;
}