<?php

namespace b2r\Component\Exception;

/**
 * Utility functions
 */
abstract class Utils
{
    /**
     * Get type string of $value
     *
     * @param mixed $value
     * @param bool $passString If $value is string, return $value itself
     * @return string
     */
    public static function getType($value, bool $passString = false): string
    {
        if (is_object($value)) {
            return get_class($value);
        } elseif ($passString && is_string($value)) {
            return $value;
        } else {
            return gettype($value);
        }
    }
}
