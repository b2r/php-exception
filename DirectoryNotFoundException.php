<?php

namespace b2r\Component\Exception;

class DirectoryNotFoundException extends IOException
{
    protected static $template = 'Directory Not Found: "%s"';
}
