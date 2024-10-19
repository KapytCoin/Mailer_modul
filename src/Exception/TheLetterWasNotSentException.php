<?php

namespace App\Exception;

use RuntimeException;

class TheLetterWasNotSentException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The letter was not sent');
    }
}