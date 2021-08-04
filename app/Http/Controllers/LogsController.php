<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function showLogs()
    {
        $logs = auth()->user()->details()->where('doc_type_id', 3)->get();
        return $this->SuccessData($logs);
    }
}
