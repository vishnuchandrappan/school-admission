<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailsRequest;
use App\Http\Requests\VerifyPaymentRequest;
use App\Models\Details;
use App\Models\DocType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            Log::info(auth()->user());
            $details = auth()->user()->details()->where('doc_type_id', $docType->id)->firstOrFail();
            Log::info($details);
        } catch (\Exception $e) {
            Log::error('Exception raiesed');
            return $this->SuccessData(null);
        }

        return $this->SuccessData($details);
    }

    public function verifyPayment(Details $payment, VerifyPaymentRequest $request)
    {
        $payment->update([
            'data' => $request->data
        ]);
        return $this->SuccessResponse('payment verified');
    }

    public function uploadDocs(Request $request)
    {
        $user = auth()->user();
        $data = [
            'data' => [
                'file' => $this->storeFile($request)
            ]
        ];

        $docType = DocType::where('name', $request->doc_type)->firstOrFail();
        $data['doc_type_id'] = $docType->id;

        if ($user->details()->where('doc_type_id', $docType->id)->exists()) {
            $filePath = explode(
                '/',
                $user->details()->where('doc_type_id', $docType->id)
                    ->firstOrFail()->data->file
            );
            $this->deleteFile('public/files/' . end($filePath));
            $user->details()->where('doc_type_id', $docType->id)->first()->update($data);
            $details = $user->details;
        } else {
            $details = $user->details()->create($data);
        }

        return $this->SuccessData($details);
    }

    private $supportingDocs =
    [
        'ration_card',
        'aadhar_card',
        'sslc_marklist',
        'declaration_from_parish_priest',
        'other_certificates',
    ];

    private function getDocIds()
    {
        return DocType::whereIn('name', $this->supportingDocs)->pluck('id');
    }


    public function getSupportingDocs()
    {
        $docIds = $this->getDocIds();
        $user = auth()->user();
        $data = $user->details()->whereIn('doc_type_id', $docIds)->with('docType')->get();

        return $this->SuccessData($data);
    }
}
