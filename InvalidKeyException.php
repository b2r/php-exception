<?php

namespace b2r\Component\Exception;

class InvalidKeyException extends Exception
{
    protected static $template = 'Invalid key: %s';
}
