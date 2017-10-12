<?php
require __DIR__ . '/vendor/autoload.php';

use function Functional\curry;


function some_test() {
    $arr = [1, 2, 3];

    function double($a) {
        return $a * 2;
    }

    return array_map('double', $arr);
}

function curry_test() {
    $mult_with = function($a, $b) {
        return $a * $b;
    };

    $multiply_with_5 = curry($mult_with)(5);
    echo $multiply_with_5(3) . "\n";
}

$ret = some_test();
echo join(' ', $ret) . "\n";

curry_test();
