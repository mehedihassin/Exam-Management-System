<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examinee;
use App\Models\ExamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamRequestController extends Controller
{
    public function request(Request $request, $id)
    {
        $this->authorize('admin_controller_examinee');
        $exam = Exam::find($id);
        $exam_request =   ExamRequest::where('user_id', Auth()->user()->id)
            ->where('exam_id', $exam->id)
            ->first();
        if ($exam_request == null) {
            ExamRequest::create([
                'user_id' => Auth()->user()->id,
                'exam_id' => $exam->id,
                'message' => $request->message
            ]);
            toastr()->success('Request send. Please wait', 'Congrats');
            return redirect()->route('dashboard');
        } else {
            Session::flash('alert', 'You already send a request. Please wait for response.');
            return redirect()->back();
        }
    }

    public function index()
    {
        $this->authorize('admin');
        $exam_requests = ExamRequest::all();
        return view('backend.exam_requests.exam_request_index', compact('exam_requests'));
    }

    public function show($id)
    {
        $this->authorize('admin');
        $exam_request = ExamRequest::where('exam_id', $id)
            ->where('user_id', Auth()->user()->id)
            ->first();

        return view('backend.exam_requests.exam_request_show', compact('exam_request'));
    }
    public function edit($id)
    {
        $this->authorize('admin');
        $exam_request =  ExamRequest::find($id);
        session()->put('exam_request', $exam_request);
        $examinee = Examinee::where('user_id', $exam_request->user_id)
            ->where('exam_id', $exam_request->exam_id)
            ->first();
        return view('backend.exam_requests.exam_request_edit', compact('examinee'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $user_id = Examinee::find($id);
        $examinee = Examinee::where('user_id', $user_id->user_id)
            ->where('exam_id', $request->exam_id)
            ->first();

        $examinee->update([
            'time' => $request->time,
            'status' => $request->status
        ]);
        $exam_request =  session()->get('exam_request');
        $exam_request->delete();
        toastr()->success('Exam request Updated!', 'Congrats');
        return redirect()->route('exam_request_index');
    }
    public function accept($id)
    {
        $this->authorize('admin');
        $exam_request =  ExamRequest::find($id);
        Examinee::where('user_id', $exam_request->user_id)
            ->where('exam_id', $exam_request->exam_id)
            ->delete();
        $exam_request->delete();
        toastr()->success('Exam request accepted!', 'Congrats');
        return redirect()->route('exam_request_index');
    }
    public function reject($id)
    {
        $this->authorize('admin');
        ExamRequest::find($id)->delete();
        return redirect()->route('exam_request_index');
    }
}