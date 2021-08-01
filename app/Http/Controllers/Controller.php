<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
