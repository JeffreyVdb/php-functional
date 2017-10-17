<?php
require __DIR__ . '/vendor/autoload.php';

use function Functional\curry;

$add = function($a, $b) {
    return $a + $b;
};

$data = [1, 3, 5];

$add_5 = curry($add)(5);
print_r(array_map($add_5, $data));
