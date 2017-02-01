<?php

namespace b2r\Component\Exception;

class ConstructorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var [string $className => mixed $ctorargs]
     */
    private static $classes = [
        'Exception'                     => null,
        'FileNotFoundException'         => null,
        'InvalidArgumentException'      => null,
        'InvalidClassException'         => null,
        'InvalidIndexException'         => null,
        'IOException'                   => null,
        'LogicException'                => null,
        'NameException'                 => null,
        'RuntimeException'              => null,
        'UndefinedException'            => null,

        'InvalidClassMemberException'   => 'class',
        'InvalidMethodException'        => 'class',
        'InvalidPropertyException'      => 'class',

        'InvalidTypeException'          => 'type',
        'InvalidParameterTypeException' => 'type',
    ];

    public function testConstructor()
    {
        $namespace = '\b2r\Component\Exception\\';
        $classes = self::$classes;

        // Prepare constructor arguments
        $ctorargs = function ($class, $args) {
            if (is_array($args)) {
                return $args;
            } elseif ($args === 'class') {
                return [$class, 'member'];
            } elseif ($args === 'type') {
                return ['$name', 'expected type', null];
            } else {
                return ["Create $class"];
            }
        };

        // Create exception class instance
        foreach ($classes as $class => $args) {
            $class = $namespace . $class;
            $_args = $ctorargs($class, $args);
            $e = new $class(...$_args);
            $this->assertEquals(get_class($e), substr($class, 1));
            // All exception implements ExceptionInterface            
            $this->assertTrue($e instanceof ExceptionInterface);
        }
    }

    public function testException()
    {
        $e = new Exception('message');
        $this->assertTrue($e instanceof Exception);
    }

    public function testInvalidPropertyException()
    {
        $o = (object)[];
        $e = new InvalidPropertyException($o, 'prop');
        $this->assertTrue($e instanceof InvalidPropertyException);
    }

    public function testInvalidMethodException()
    {
        $o = (object)[];
        $e = new InvalidMethodException($o, 'method');
        $this->assertTrue($e instanceof InvalidMethodException);
    }

    public function testInvalidTypeException()
    {
        $e = new InvalidTypeException('id', 0, '0');
        $this->assertTrue($e instanceof InvalidTypeException);
    }

    public function testInvalidParameterTypeException()
    {
        $o = (object)[];
        $e = new InvalidParameterTypeException([$o, 'method', 'id'], 0, '0');
        $this->assertTrue($e instanceof InvalidParameterTypeException);
    }
}
