<?php
require __DIR__ . '/vendor/autoload.php';

use function iter\filter;
use function iter\reduce;

use DusanKasan\Knapsack\Collection;

$people = [
    ['credit' => 100, 'age' => 25],
    ['credit' => 50, 'age' => 15],
    ['credit' => 100, 'age' => 20],
    ['credit' => 120, 'age' => 18],
    ['credit' => 14, 'age' => 17],
];

$older_than_18 = function($person) {
    return $person['age'] >= 18;
};

# Using https://github.com/nikic/iter
$people_over_18 = filter($older_than_18, $people);
$credit = reduce(function($credit, $person) {
    return $credit + $person['credit'];
}, $people_over_18, 0);

var_dump($credit);

# Using https://dusankasan.github.io/Knapsack/
$credit = Collection::from($people)
    ->filter($older_than_18)
    ->reduce(function($credit, $person) {
        return $credit + $person['credit'];
    }, 0);

var_dump($credit);
