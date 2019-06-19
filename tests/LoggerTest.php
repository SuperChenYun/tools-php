<?php
use tools\logger\Logger;
use tools\logger\drive\File;
use tools\logger\drive\Redis;

include './vendor/autoload.php';

Logger::instance(new File("./tests/log.log"));
Logger::info(['a' => 'b']);
Logger::debug(['a' => 'b']);
Logger::error(['a' => 'b']);
Logger::info(['a' => 'b']);

$config = [
    'host' => '127.0.0.1',
    'port' => 6379,
    'pass' => 'redis',
    'timeout' => 1,
    'db' => 2,
];

Logger::instance(new Redis($config));

Logger::info(['a' => 'b']);
Logger::debug(['a' => 'b']);
Logger::error(['a' => 'b']);
Logger::info(['a' => 'b']);

$config = [
    'host' => '127.0.0.1',
    'port' => 27017,
    'user' => 'mongo',
    'pass' => 'mongo',
    'db' => 'logger',
    'table' => 'logger'
];
