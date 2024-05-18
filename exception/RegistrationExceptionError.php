<?php

namespace exception;

class RegistrationExceptionError extends \Exception
{
    public function getRegistrationExceptionMessage(): string
    {
        return "Registration error: " . $this->getMessage();
    }
}