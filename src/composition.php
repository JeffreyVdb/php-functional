<?php
require __DIR__ . '/vendor/autoload.php';

use function Functional\compose;
use function Functional\partial_left;

$mask_stars = partial_left('str_repeat', '*');
$mask_password = compose('strlen', $mask_stars);

function mask_password($password, $character) {
    return str_repeat($character, strlen($password));
}

var_dump($mask_password('abc123'));
var_dump(mask_password('abc123', '*'));
