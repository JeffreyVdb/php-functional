<?php
require __DIR__ . '/vendor/autoload.php';
use function Functional\compose;
use function iter\fn\operator;

function take_while($callback, $gen) {
    foreach ($gen as $elem) {
        if ($callback($elem)) {
            yield $elem;
        }
        else {
            return;
        }
    }
}

function one_to_infinity() {
    $i = 0;
    while (true) {
        yield ++$i;
    }
}

$result = take_while(function($x) { return $x ** 2 < 1000; }, one_to_infinity());
print_r(iterator_to_array($result));

$squared_less_than_1000 = compose(operator('**', 2), operator('<', 1000));
$result_composed = take_while($squared_less_than_1000, one_to_infinity());
print_r(iterator_to_array($result_composed));
