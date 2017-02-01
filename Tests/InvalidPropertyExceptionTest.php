<?php

namespace b2r\Component\Exception;

class InvalidPropertyExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        $o = (object)[];
        $e = new InvalidPropertyException($o, 'foo');
        $this->assertTrue($e instanceof InvalidPropertyException);
    }
}
