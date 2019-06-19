<?php

namespace tools\table;

use tools\exception\FileNotExistsException;

class Csv
{
    /**
     * 导入
     *
     * @param string $filePath
     * @return void
     */
    public static function import(string $filePath = '')
    {
        if (!file_exists($filePath))  {
            throw new FileNotExistsException();
        }
    }

    /**
     * 导出
     *
     * @param array $tableData
     * @param boolean $toFile
     * @param string $toFilePath
     * @return void
     */
    public static function export(array $tableData, $toFile = true, $toFilePath = '')
    {
        if ($toFile && ($toFilePath = '' || !file_exists($toFilePath)))  {
            throw new FileNotExistsException();
        }

    }
}