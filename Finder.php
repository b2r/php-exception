<?php

namespace b2r\Component\Exception;

use ReflectionClass;

/**
 * Exception class name finder
 */
abstract class Finder
{
    protected static $aliases = [
        'arg'    => 'InvalidArgument',
        'dir'    => 'DirectoryNotFound',
        'file'   => 'FileNotFound',
        'index'  => 'InvalidIndex',
        'method' => 'InvalidMethod',
        'param'  => 'InvalidParameterType',
        'prop'   => 'InvalidProperty',
        'type'   => 'InvalidType',
    ];

    protected static $namespaces = [
        __NAMESPACE__ . '\\',
        '',
    ];

    protected static $suffixes = [
        'Exception',
        '',
    ];

    /**
     * @alias getClass
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::getClass($name);
    }

    /**
     * @return string|null Return FQCN(Full qualified class name) or null
     */
    public static function getClass(string $name)
    {
        $key = strtolower($name);
        if (array_key_exists($key, self::$aliases)) {
            $name = self::$aliases[$key];
        }

        foreach (self::$namespaces as $namespace) {
            foreach (self::$suffixes as $suffix) {
                $class = $namespace . $name . $suffix;
                if (class_exists($class)) {
                    return $class;
                }
            }
        }
    }
}
