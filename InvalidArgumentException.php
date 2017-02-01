<?php

namespace b2r\Component\Exception;

class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    use ExceptionTrait;
}
