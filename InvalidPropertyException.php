<?php

namespace b2r\Component\Exception;

class InvalidPropertyException extends InvalidClassMemberException
{
    protected static $template = 'Invalid property %s::$%s';
}
