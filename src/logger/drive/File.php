<?php

namespace tools\logger\drive;

use tools\file\File as Files;

class File extends Files
{
    public function write($content)
    {
        parent::write($content  . "\n");
    }
}