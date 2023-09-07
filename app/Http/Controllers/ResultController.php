<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {

        $this->authorize('examinee');
        $user_id = auth()->user()->id;

        $results = Result::where('user_id', $user_id)->get();
        return view('backend.results.result_index', compact('results'));
    }
    public function show($id)
    {
        $this->authorize('examinee');
        $records = Record::where('exam_id', $id)->where('user_id', auth()->user()->id)->get();
        return view('backend.results.result_show', compact('records'));
    }
}
