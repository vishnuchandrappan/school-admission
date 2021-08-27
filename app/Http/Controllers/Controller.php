<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

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

    protected function getFileUrl($fileName)
    {
        return asset(Storage::url($fileName));
    }

    protected function storeFile($request, $paramName = 'file', $prefix = 'files')
    {
        if ($request->hasFile($paramName)) {
            $image = $request->file($paramName);
            $path = $image->store("public/$prefix");
            return $this->getFileUrl($path);
        }

        return null;
    }

    protected function deleteFile($fileName)
    {
        if (Storage::exists($fileName)) {
            if (Storage::delete($fileName)) {
                return true;
            };
        }

        return false;
    }
}
