<?php

namespace App\Exceptions;

use Exception;

class FailSSConnection extends Exception
{
    public function render($request){
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
        ]);
    }
}
