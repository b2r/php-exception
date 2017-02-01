<?php

namespace b2r\Component\Exception;

class FileNotFoundException extends IOException
{
    protected static $template = 'File Not Found: "%s"';
}
