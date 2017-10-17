<?php
$add = function($a, $b) {
    return $a + $b;
};

$curriedAdd = function($a) {
    return function($b) use($a) {
        return $a + $b;
    };
};

print_r([
    $add(4, 6),
    $curriedAdd(4)(6),
]);


