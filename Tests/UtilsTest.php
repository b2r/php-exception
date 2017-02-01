<?php

namespace b2r\Component\Exception;

class UtilsTest extends \PHPUnit\Framework\TestCase
{
    public function testGetType()
    {
        $this->assertEquals('string', Utils::getType('hello'));
        $this->assertEquals('hello', Utils::getType('hello', true));
    }
}
