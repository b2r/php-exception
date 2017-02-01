<?php

namespace b2r\Component\Exception;

class LogicException extends \LogicException implements ExceptionInterface
{
    use ExceptionTrait;
}
