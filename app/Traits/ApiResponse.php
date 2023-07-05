<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * Send success message
     *
     * @param  int  $statusCode
     * @param  string  $message
     * @param  array|object  $data
     */
    public function success($data, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode, []);
    }

    /**
     * Send error message
     *
     * @param  int  $statusCode
     * @param  string  $message
     */
    public function error($message, $statusCode = 500)
    {
        return response()->json([
            'success' => false,
            'code' => $statusCode,
            'message' => $message,
        ], $statusCode, []);
    }

     /**
      * Send validation error message
      *
      * @param  array|object  $errors
      */
     public function validationError($errors)
     {
         return response()->json([
             'success' => false,
             'code' => 422,
             'message' => 'Validation Failure',
             'data' => $errors,
         ], 422, []);
     }
}
