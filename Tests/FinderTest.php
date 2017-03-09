<?php

namespace b2r\Component\Exception;

class FinderTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $ex = [
            FileNotFoundException::class => ['FileNotFound', 'file'],
            InvalidArgumentException::class => ['InvalidArgument', 'arg'],
            InvalidClassException::class => ['InvalidClass'],
            InvalidClassMemberException::class => ['InvalidClassMember'],
            InvalidIndexException::class => ['InvalidIndex'],
            InvalidKeyException::class => ['InvalidKey'],
            InvalidMethodException::class => ['Method'],
            InvalidParameterTypeException::class => ['Param'],
            InvalidPropertyException::class => ['Prop'],
            InvalidTypeException::class => ['Type'],
            IOException::class => ['IO'],
            LogicException::class => ['Logic'],
            NameException::class => ['Name'],
            RuntimeException::class => ['Runtime'],
            UndefinedException::class => ['Undefined'],
            ValidationException::class => ['Validation'],
        ];
        foreach ($ex as $class => $aliases) {
            foreach ($aliases as $alias) {
                $this->assertEquals($class, Finder::$alias());
            }
        }
    }

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
