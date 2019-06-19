<?php
use tools\db\Redis;

include './vendor/autoload.php';

$config = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'pass' => 'redis',
    'timeout' => 2,
    'db' => 1
];
$redis = new Redis($config);
$redis -> set('a', 'badfadfadsf');