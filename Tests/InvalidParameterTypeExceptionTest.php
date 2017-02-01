<?php

namespace b2r\Component\Exception;

class InvalidParameterTypeExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        $e = new InvalidParameterTypeException([$this, __FUNCTION__, 'name'], 'string', []);
        $this->assertTrue($e instanceof InvalidParameterTypeException);

        $e = new InvalidParameterTypeException([__METHOD__, 'name'], 'string', []);
        $this->assertTrue($e instanceof InvalidParameterTypeException);

        $e = new InvalidParameterTypeException(['Foo', 'Bar', 'Baz', 'Hoge'], 'string', []);
        $this->assertTrue($e instanceof InvalidParameterTypeException);
    }
}
