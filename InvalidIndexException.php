<?php

namespace b2r\Component\Exception;

class InvalidIndexException extends Exception
{
    protected static $template = 'Invalid index: %s';
}
