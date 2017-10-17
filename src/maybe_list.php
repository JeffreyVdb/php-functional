<?php
require __DIR__ . '/vendor/autoload.php';

use Widmogrod\Monad\Maybe;
use Widmogrod\Primitive\Listt;

$data = [
    ['id' => 1, 'meta' => ['images' => ['//first.jpg', '//second.jpg']]],
    ['id' => 2, 'meta' => ['images' => ['//third.jpg']]],
    ['id' => 3],
];

// $get :: String a -> Maybe [b] -> Maybe b
$get = function ($key) {
    return f\bind(function ($array) use ($key) {
        return isset($array[$key])
            ? Maybe\just($array[$key])
            : Maybe\nothing();
    });
};

$result = Listt::of($data)
    ->map(Maybe\maybeNull)
    ->bind($get('meta'))
    ->bind($get('images'))
    ->bind($get(0));

assert(f\valueOf($result) === ['//first.jpg', '//third.jpg', null]);
