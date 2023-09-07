<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $this->authorize('admin_controller');
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        $questions = Question::paginate(10);
        $count =   Question::onlyTrashed()->count();

        return view('backend.questions.question_index', compact('questions', 'count', 'sl'));
    }
    public function create()
    {
        $this->authorize('admin_controller');
        $subjects = Subject::all();
        $topics = Topic::all();
        return view('backend.questions.question_create', compact('subjects', 'topics'));
    }
    public function store(Request $request)
    {
        $this->authorize('admin_controller');

        try {
            $datas = $request->all();
            foreach ($datas['question'] as $key => $data) {
                Question::create([
                    "question" =>  $data,
                    "option_1" =>  $datas['option_1'][$key],
                    "option_2" =>  $datas['option_2'][$key],
                    "option_3" =>  $datas['option_3'][$key],
                    "option_4" =>  $datas['option_4'][$key],
                    "correct_answer" =>  $datas['correct_answer'][$key],
                    "question_type" =>  $datas['question_type'][$key],
                    'subject_id' => $request->subject_id,
                    'topic_id' => $request->topic_id
                ]);
            }


            toastr()->success('Question added successfully!', 'Congrats');
            return redirect()->route('question_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function delete($id)
    {
        $this->authorize('admin_controller');
        Question::find($id)->delete();
        toastr()->error('Question deleted!', 'Warning');
        return redirect()->back();
    }

    public function edit($id)
    {
        $this->authorize('admin_controller');
        $subjects = Subject::all();
        $question =  Question::find($id);
        $topics = Topic::all();
        return view('backend.questions.question_edit', compact('question', 'subjects', 'topics'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('admin_controller');
        try {
            $question =  Question::find($id);
            $question->update($request->except('_token'));
            toastr()->success('Question updated successfully!', 'Congrats');
            return redirect()->route('question_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function trash()
    {
        $this->authorize('admin_controller');
        $questions = Question::onlyTrashed()->get();

        return view('backend.questions.question_trash', compact('questions'));
    }
    public function restore($id)
    {
        $this->authorize('admin_controller');
        Question::withTrashed()->find($id)->restore();
        toastr()->success('Question restored successfully!', 'Congrats');
        return redirect()->back();
    }
    public function remove($id)
    {
        $this->authorize('admin_controller');
        Question::withTrashed()->find($id)->forceDelete();
        toastr()->error('Question permanently deleted!', 'Warning');
        return redirect()->back();
    }
    public function show($id)
    {
        $this->authorize('admin_controller');
        $question = Question::find($id);


        return view('backend.questions.question_show', compact('question'));
    }
}
