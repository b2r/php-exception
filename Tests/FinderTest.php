<?php

namespace b2r\Component\Exception;

class FinderTest extends \PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        $validNames = [
            'arg',
            'dir',
            'file',
            'param',
        ];
        foreach ($validNames as $name) {
            $class = Finder::getClass($name);
            $this->assertTrue($class !== null);
        }

        $invalidNames = ['Foo'];
        foreach ($invalidNames as $name) {
            $class = Finder::getClass($name);
            $this->assertTrue($class === null);
        }
    }

    public function testCallStatic()
    {
        $this->assertTrue(Finder::IO() !== null);
    }
}
