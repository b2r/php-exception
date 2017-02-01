<?php

namespace b2r\Component\Exception;

class InvalidClassException extends Exception
{
    protected static $template = 'Invalid class %s';
}
