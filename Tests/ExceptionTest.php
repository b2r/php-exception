<?php

namespace b2r\Component\Exception;

class FooBarBazException extends Exception
{
    protected static $template = '$s: %s.$s.$s';

    public function __construct()
    {
        parent::__construct([$this, 'Foo', 'Bar', 'Baz']);
    }
}

class ExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        $message = 'Hello, Exception';
        $e = new Exception($message);
        $this->assertEquals($message, $e->message);
    }

    public function testFooBarBaz()
    {
        $e = new FooBarBazException();
        $this->assertTrue($e instanceof Exception);
    }

    public function testGetType()
    {
        $e = new Exception('');
        $this->assertEquals('string', $e->getType('hello'));
        $this->assertEquals('hello', $e->getType('hello', true));
        $this->assertEquals(get_class($e), $e->getType($e));
    }

    /**
     * @expectedException b2r\Component\Exception\InvalidPropertyException
     */
    public function testMagicGetterException()
    {
        $e = new Exception('Exception');
        $e->undefinedProperty;
    }
}
