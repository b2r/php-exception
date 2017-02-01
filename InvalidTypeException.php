<?php

namespace b2r\Component\Exception;

class InvalidTypeException extends Exception
{
    protected static $template = '%s must be of the type `%s`, but `%s` given';

    /**
     * Constructor
     * 
     * @param string|array
     * @param mixed $validType Valid type name or instance
     * @param mixed $invalidInputType Invalid input type
     */
    public function __construct(
        $name,
        $validType,
        $invalidInputType,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $validType = $this->getType($validType, true);
        $invalidInputType = $this->getType($invalidInputType);
        return parent::__construct([$name, $validType, $invalidInputType], $code, $previous);
    }

    protected function encodeArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if (!is_string($value)) {
                $array[$key] = $this->getType($value, true);
            }
        }
        return $array;
    }
}
