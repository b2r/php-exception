<?php

namespace b2r\Component\Exception;

class RuntimeException extends \RuntimeException implements ExceptionInterface
{
    use ExceptionTrait;
}
