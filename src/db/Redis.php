<?php

namespace tools\db;

/**
 * RedisDrive
 * 
 * 配置
 * $config = [
 *     "host":"",
 *     "port":"",
 *     "timeout":"",
 *     "pass":"",
 *     "db":"",
 * ]
 * 
 * @method \Redis set($key, $val)
 * @method \Redis get($key)
 */
class Redis {

    /**
     * @var [\Redis]
     */
    private $redis;

    /**
     * Undocumented function
     *
     * @param [type] $config
     */
    public function __construct($config)
    {
        $this -> config = $config;
        $this -> redis = new \Redis();
        $this -> redis -> connect($this -> config['host'], $this -> config['port'], $this -> config['timeout']);
        $connectState = $this -> redis->auth($this-> config['pass']); //登录验证密码，返回【true | false】
        if (false == $connectState) {
            throw new ConnectException('Redis 授权失败');
        }
        if (isset($this -> config['db'])) {
            $this -> redis -> select($this -> config['db']);
        }
    }

    public function __destruct()
    {
        $this -> redis -> close();
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->redis,$name], $arguments);
    }
}