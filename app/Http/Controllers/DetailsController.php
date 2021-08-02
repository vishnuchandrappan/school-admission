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

    public function show(Request $request)
    {
        $docTypeName = $request->doc_type;

        try {
            $docType = DocType::where('name', $docTypeName)->firstOrFail();
        } catch (\Exception $e) {
            return $this->ErrorResponse('Invalid doc type');
        }

        try {
            $details = auth()->user()->details()->where('doc_type_id', $docType->id)->firstOrFail();
        } catch (\Exception $e) {
            return $this->SuccessData(null);
        }

        return $this->SuccessData($details);
    }
}
