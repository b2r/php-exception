<?php

namespace b2r\Component\Exception;

class InvalidClassMemberException extends Exception
{
    protected static $template = 'Invalid class member %s::%s';

    /**
     * Constructor
     * 
     * @param string|object $class Class name or instance
     * @param string $name Class member name
     */
    public function __construct(
        $class,
        string $name,
        int $code = 0,
        \Throwable $previous = null
    ) {
        return parent::__construct([$class, $name], $code, $previous);
    }
}
