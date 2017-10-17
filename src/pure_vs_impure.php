<?php
require __DIR__ . '/vendor/autoload.php';
use function Functional\flip;
use function Functional\curry;
use function Functional\partial_right;

define('LOG_PATH', '/' . join(DIRECTORY_SEPARATOR, ['var', 'log']));

function impure_log_path($log_file) {
    return LOG_PATH . DIRECTORY_SEPARATOR . $log_file;
}

function pure_log_path($log_file, $base_directory) {
    return $base_directory . DIRECTORY_SEPARATOR . $log_file;
}

$pure_log_path = partial_right('pure_log_path', LOG_PATH);

var_dump(impure_log_path('nginx.log'));
var_dump($pure_log_path('nginx.log'));
