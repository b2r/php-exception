<?php

namespace b2r\Component\Exception;

class InvalidParameterTypeException extends InvalidTypeException
{
    /**
     * Assume $source is [$method, $param] or [$class, $method, $param]
     */
    protected function encodeArrayName(array $source): string
    {
        $source = $this->encodeArray($source);
        $count = count($source);
        if ($count === 2 || $count === 3) {
            $name = array_pop($source);
            $method = implode('::', $source);
            return sprintf('%s() $%s parameter', $method, $name);
        } else {
            return implode('::', $source);
        }
    }

    protected function encodeMessage($message): string
    {
        if ($message && is_array($message) && is_array($message[0])) {
            $message[0] = $this->encodeArrayName($message[0]);
        }
        return parent::encodeMessage($message);
    }
}
