<?php

namespace b2r\Component\Exception;

class InvalidTypeExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        $e = new InvalidTypeException('$name', 'string', []);
        $this->assertTrue($e instanceof InvalidTypeException);

        $e = new InvalidTypeException('$key', 'string|int', []);
        $this->assertTrue($e instanceof InvalidTypeException);
    }
}
