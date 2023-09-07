<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examinee;

class AllResultController extends Controller
{
    public function index()
    {

        $this->authorize('admin');
        $exams = Exam::all();
        return view('backend.all_results.all_result_index', compact('exams'));
    }

    public function show($id)
    {
        $this->authorize('admin');
        $examinees = Examinee::where('exam_id', $id)->get();
        return view('backend.all_results.all_result_show', compact('examinees'));
    }
}
