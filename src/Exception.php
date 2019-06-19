<?php

namespace tools;

/**
 * 工具包基础异常类
 */
class Exception extends \Exception
{

    /**
     * 获取异常的堆栈日志
     *
     * @return void
     */
    public function getTraceData()
    {
        return "ErrorCode: {$this->getCode()} ，\n".
            "ErrorMsg: {$this->getMessage()},  \n".
            "ErrorFile: {$this->getFile()}:{$this->getLine()} , \n".
            "Trace:{$this->getTraceAsString()}\n";
    }
}