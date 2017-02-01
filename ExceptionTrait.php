<?php

namespace b2r\Component\Exception;

/**
 * Exception core trait
 *
 * - Message template
 * - Format message through `encodeMessage` and `encodeArray` method
 * - Magic getter
 * - Some utility methods
 */
trait ExceptionTrait
{
    /**
     * Template string
     *
     * @var string
     */
    protected static $template = '%s';

    /**
     * @param string|array $message
     * @return self
     */
    public function __construct($message, int $code = 0, \Throwable $previous = null)
    {
        $message = $this->encodeMessage($message);
        parent::__construct($message, $code, $previous);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        throw new InvalidPropertyException($this, $name);
    }

    /**
     * Default array encoder
     *
     * - Convert object to class name
     */
    protected function encodeArray(array $args): array
    {
        foreach ($args as $key => $value) {
            if (is_object($value)) {
                $args[$key] = get_class($value);
            }
        }
        return $args;
    }

    /**
     * @param string|array $message
     */
    protected function encodeMessage($message): string
    {
        if (is_array($message)) {
            $args = $this->encodeArray($message);
            return sprintf(static::$template, ...$args);
        } else {
            return sprintf(static::$template, $message);
        }
    }

    /**
     * @alias Utils::getType
     */
    public static function getType($value, bool $passString = false): string
    {
        return Utils::getType($value, $passString);
    }
}
