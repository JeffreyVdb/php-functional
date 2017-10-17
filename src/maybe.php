<?php
require __DIR__ . '/vendor/autoload.php';

use Widmogrod\Monad\Maybe;

$ret = Maybe\maybeNull(5)->bind(function ($n) {
    return $n * 3;
});

var_dump($ret);

$ret = Maybe\maybeNull(null)->bind(function ($n) {
    return $n * 3;
});

var_dump($ret);
