<?php

namespace tools\sign;

class Sign {
    private function __construct(){}

    /**
     * Md5 计算签名
     *
     * @param [array] $content
     * @param [string] $signKey
     * @return string
     */
    public static function md5Sign($content, $signKey)
    {
        $signStr = self::arraySortToString($content);
        $signStr .= '&key='.$signKey;
        return md5($signStr);
    }

    /**
     * 数组转成要加密的字符串
     *
     * @param array $content
     * @return string
     */
    private static function arraySortToString($content)
    {
        $signStr = '';
        ksort($content);
        foreach($content as $k => $v) {
            $signStr .= trim($k) . '=' . trim($v) . '&';
        }
        return $signStr;
    }

    /**
     * RSA2 加密
     *
     * @param [array] $content
     * @param [string] $key
     * @return void
     */
    public static function rsa2($content, $key)
    {

    }

    /**
     * RSA 加密
     *
     * @param [array] $content
     * @param [string] $key
     * @return void
     */
    public static function rsa($content, $key)
    {

    }
}