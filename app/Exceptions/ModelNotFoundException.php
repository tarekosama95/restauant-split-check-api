<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;

class ModelNotFoundException extends Exception
{
    use ApiResponse;

    public function __construct(protected $errorCode = 0)
    {

    }

    /**
     * Render exception to http response
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return $this->error('Resource Not Found');
    }
}
