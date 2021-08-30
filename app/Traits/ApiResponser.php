<?php

namespace App\Traits;

trait ApiResponser
{
    public function SuccessResponse($message = 'Success', $responseCode = 200)
    {
        return response()->json([
            'message' => $message
        ], $responseCode);
    }

    public function SuccessData($data = [], $message = 'Success', $responseCode = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $responseCode);
    }

    public function ErrorResponse($message = 'Error', $responseCode = 400)
    {
        return response()->json([
            'message' => $message
        ], $responseCode);
    }
}
