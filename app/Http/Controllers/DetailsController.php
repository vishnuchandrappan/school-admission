<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailsRequest;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function store(CreateDetailsRequest $request)
    {
        $user = auth()->user();
        $data = $request->only(['meta']);
        $user->details()->create($data);

        return $this->SuccessResponse('details updated');
    }
}
