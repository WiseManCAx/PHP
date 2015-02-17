<?php

function safeInput($string) {
    $string = trim($string);
    $string = str_replace('!', '', $string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    return $string;
}