<?php

namespace App\Exception;

use Throwable;

class InvalidStateTransitionException extends \Exception
{
    public function __construct($message = "Invalid state transition!", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}