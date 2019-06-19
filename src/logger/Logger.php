<?php
namespace tools\logger;

class Logger 
{
    static $logFilePath = '';

    static $drive;

    public static function instance($drive)
    {
        self::$drive = $drive;
    }

    public static function info($data)
    {
        self::write($data, '[' . strtoupper(__FUNCTION__) . ']');
    }

    public static function debug($data)
    {
        self::write($data, '[' . strtoupper(__FUNCTION__) . ']');
    }

    public static function warning($data)
    {
        self::write($data, '[' . strtoupper(__FUNCTION__) . ']');
    }

    public static function error($data)
    {
        self::write($data, '[' . strtoupper(__FUNCTION__) . ']');
    }

    /**
     * 写入
     *
     * @param [array|string|object|\Exception] $data
     * @param string $prefix
     * @return void
     */
    private static function write($data, $prefix = '')
    {
        $content = self::dataToString($data);

        self::$drive -> write(self::getNowTime() . $prefix . $content);
    }

    /**
     * 获取当前时间
     */
    private static function getNowTime()
    {
        return '['.date('Y-m-d H:i:s', time()).']';
    }

    /**
     * 转成字符串 存日志
     *
     * @param [array|string|object|\Exception] $data
     * @return void
     */
    private static function dataToString($data)
    {
        $content = '';

        if (is_array($data)) {

            $content = json_encode($data, JSON_UNESCAPED_UNICODE);

        } else if (is_object($data)) {

            if ($data instanceof \Exception) {
                $content = $data->getTraceData();
                
            } else {

                $content = json_encode($data, JSON_UNESCAPED_UNICODE);
            }

        } else {

            $content = $data;
        }

        return $content;
    }
}