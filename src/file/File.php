<?php

namespace tools\file;

use tools\exception\FileNotExistsException;

class File
{
    /**
     * 文件位置
     *
     * @var string
     */
    private $filePath = '';

    public function __construct($filePath)
    {
        $this -> filePath = $filePath;        
    }

    /**
     * 写入到文件
     *
     * @param [string] $content
     * @return void
     */
    public function write($content)
    {
        if(!file_exists(dirname($this->filePath)) ) {
            mkdir(dirname($this->filePath), 0777, true);
        }
        file_put_contents($this->filePath, $content, FILE_APPEND);
    }

    /**
     * 读取文件
     *
     * @return void
     */
    public function read()
    {
        if (!file_exists($this->filePath)) {
            throw new FileNotExistsException('文件不存在: ' . $this->filePath);
        }
        return file_get_contents($this->filePath);
    }
}