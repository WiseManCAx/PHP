<?php

$name = trim($_POST['name']);
$pas = trim($_POST['pass']);
if (mb_strlen($name) < 5) {
    $error_array['name'] = 'Много кратко име за псевдоним.
        <br />Името трябва да е поне няколко символа.';
}
if (mb_strlen($name) > 64) {
    $error_array['name'] = 'Много дълго име за псевдоним.
        <br />Името трябва да е до 64 символа.';
}
if (mb_strlen($pas) < 5) {
    $error_array['pass'] = 'Невалидна или кратка парола.';
}
if (mb_strlen($pas) > 32) {
    $error_array['pass'] = 'Много дълга парола. Максимално до 32 символа.';
}