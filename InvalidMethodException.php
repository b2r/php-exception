<?php

namespace b2r\Component\Exception;

class InvalidMethodException extends InvalidClassMemberException
{
    protected static $template = 'Invalid method %s::%s()';
}
