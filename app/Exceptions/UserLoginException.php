<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserLoginException extends Exception
{
    public function render()
    {
        return response(['error' => $this->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}
