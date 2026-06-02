<?php

namespace App\Exceptions;

use Exception;

class GenericException extends Exception
{
    public function render($request, $status = 0)
    {
        return response()->json(
            [
                'status' => false,
                'data' => null,
                'error' => [
                    'message' => trans($this->getMessage()),
                    'code' => $this->getCode(),
                    'status' => $status
                ]
            ],
            $status
        );
    }
}
