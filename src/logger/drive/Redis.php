<?php

namespace tools\logger\drive;

use tools\db\Redis as RedisDB;

class Redis
{
   /**
     * Redis
     */
    static $redis;

    /**
     * 
     */
    static $loggerQueueName;

    /**
     * 
     * $config = [
     *     "host":"",
     *     "port":"",
     *     "timeout":"",
     *     "pass":"",
     *     "db":"",
     *     "logger_queue_name":"",
     * ]
     *
     * @param [type] $config
     */
    public function __construct($config)
    {

        self::$loggerQueueName = $config['logger_queue_name'] ?? 'logger_queue';
        self::$redis = new RedisDB($config);
    }

    /**
     * 写入
     *
     * @param [string] $content
     * @return void
     */
    public function write($content)
    {
        return self::$redis -> lpush(self::$loggerQueueName, $content);
    } 
}