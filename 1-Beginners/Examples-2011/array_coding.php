<?php

$_note_books = array(
    0 => array('name' => 'Ivan', 'age' => 18),
    1 => array('name' => 'Stoyan', 'age' => 31),
    2 => array('name' => 'Dragan', 'age' => 12),
    3 => array('name' => 'Marya', 'age' => 22),
    4 => array('name' => 'Zoya', 'age' => 15)
);

function filter($_ne_pylnoletni) {
    if (18 <= $_ne_pylnoletni['age']) {
        return$_ne_pylnoletni;
    }
}

$_age = array_filter($_note_books, filter($_ne_pylnoletni));
?>
