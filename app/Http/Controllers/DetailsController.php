<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailsRequest;
use App\Models\DocType;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function store(CreateDetailsRequest $request)
    {
        $user = auth()->user();
        $data = [
            'data' => $request->meta
        ];

        $docType = DocType::where('name', $request->doc_type)->first();
        $data['doc_type_id'] = $docType->id;

        $details = $user->details()->create($data);

        return $this->SuccessData($details);
    }
}
