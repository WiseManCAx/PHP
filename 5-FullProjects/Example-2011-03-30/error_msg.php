<?php

$error_msg = &$messages['login_error']; // Create a reference

$messages['login_error'] = 'test'; // Then later on set the referenced value

echo $error_msg; // echo the 'referenced value'