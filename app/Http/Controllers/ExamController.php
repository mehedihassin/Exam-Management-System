<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examinee;
use App\Models\Question;
use App\Models\Record;
use App\Models\Result;
use App\Models\Subject;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $this->authorize('admin_controller');
        $count =   Exam::onlyTrashed()->count();
        $exams = Exam::all();
        return view('backend.exams.exam_index', compact('count', 'exams'));
    }
    public function create()
    {
        $this->authorize('admin_controller');

        $subjects = Subject::all();
        $topics = Topic::all();

        return view('backend.exams.exam_create', compact('subjects', 'topics'));
    }
    public function store(Request $request)
    {
        $this->authorize('admin_controller');
        try {
            $data = $request->all();
            Exam::create($data);
            toastr()->success('Exam added successfully!', 'Congrats');
            return redirect()->route('exam_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function edit($id)
    {
        $this->authorize('admin_controller');
        $exam = Exam::find($id);
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('backend.exams.exam_edit', compact('exam', 'subjects', 'topics'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('admin_controller');
        try {
            $data = $request->all();
            $exam = Exam::find($id);
            $exam->update($data);
            toastr()->success('Exam updated successfully!', 'Congrats');
            return redirect()->route('exam_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function delete($id)
    {
        $this->authorize('admin_controller');

        $exam = Exam::find($id);
        $exam->delete();
        toastr()->error('Exam deleted!', 'Warning');
        return redirect()->back();
    }
    public function trash()
    {
        $this->authorize('admin_controller');
        $exams = Exam::onlyTrashed()->get();

        return view('backend.exams.exam_trash', compact('exams'));
    }
    public function restore($id)
    {
        $this->authorize('admin_controller');

        Exam::withTrashed()->find($id)->restore();
        $exam = Exam::find($id);
        toastr()->success('Exam restored successfully!', 'Congrats');
        return redirect()->back();
    }
    public function remove($id)
    {
        $this->authorize('admin_controller');
        Exam::withTrashed()->find($id)->forceDelete();
        toastr()->error('Exam permanently deleted!', 'Warning');
        return redirect()->back();
    }
    public function active($id)
    {
        $this->authorize('admin_controller');
        Exam::find($id)->update([
            'status' => 'active'
        ]);
        toastr()->success('Exam activated!', 'Congrats');
        return redirect()->back();
    }
    public function inactive($id)
    {
        $this->authorize('admin_controller');
        Exam::find($id)->update([
            'status' => 'inactive'
        ]);
        toastr()->error('Exam canceled!', 'Warning');
        return redirect()->back();
    }
    public function list($id)
    {
        $this->authorize('admin_controller_examinee');
        $topic = Topic::find($id);
        $exams = Exam::where('status', 'active')
            ->where('topic_id', $id)
            ->where('subject_id', $topic->subject->id)
            ->paginate(6);
        return view('backend.exams.exam_list', compact('exams'));
    }
    public function start($id)
    {
        $this->authorize('admin_controller_examinee');

        $user_id = Auth()->user()->id;
        $exam = Exam::find($id);



        session()->put('exam_id', $exam->id);
        //examinee with status 1
        $examinee_1 = Examinee::where('user_id', $user_id)
            ->where('exam_id', $exam->id)
            ->where('status', 1)->exists();
        //examinee with status 0
        $examinee_0 = Examinee::where('user_id', $user_id)
            ->where('exam_id', $id)->where('status', 0)->first();



        if ($examinee_1) {
            return view('backend.exam_requests.exam_request', compact('exam'));
        } elseif (!$examinee_1 && !$examinee_0) {
            Examinee::create([
                'user_id' => $user_id,
                'exam_id' => $exam->id,
                'time' => $exam->time,
                'status' => 1,
            ]);
            $questions = Question::where('subject_id', $exam->subject->id)
                ->where('topic_id', $exam->topic_id)
                ->where('question_type', $exam->level)->get();

            $random_questions = $questions->shuffle()->slice(0, $exam->total_question);

            return view('backend.exams.exam_start', compact('random_questions', 'exam', 'examinee_0'));
        } elseif ($examinee_0 != null) {

            $examinee_0->update([
                'user_id' => $user_id,
                'exam_id' => $exam->id,
                'time' => $examinee_0->time,
                'status' => 1,
            ]);
            $questions = Question::where('subject_id', $exam->subject->id)
                ->where('topic_id', $exam->topic_id)
                ->where('question_type', $exam->level)->get();

            $random_questions = $questions->shuffle()->slice(0, $exam->total_question);

            return view('backend.exams.exam_start', compact('random_questions', 'exam', 'examinee_0'));
        }
    }
    public function submit(Request $request)
    {
        $this->authorize('admin_controller_examinee');


        $exam_id =  session()->get('exam_id');


        $total_question = $request->total_question;
        $selected_answers = $request->answer;


        $correct_answers = 0;
        $incorrect_answers = 0;

        $records = Record::where('user_id', Auth()->user()->id)
            ->where('exam_id', $exam_id)->forceDelete();

        if ($selected_answers !== null) {
            foreach ($selected_answers as $key => $answer) {
                $question = Question::find($key);

                Record::create([
                    'user_id' =>  Auth()->user()->id,
                    'question_id' => $key,
                    'exam_id' => $exam_id,
                    'submitted_answer' => $answer,
                ]);

                if ($question->correct_answer === $answer) {
                    $correct_answers++;
                }
            }
        } else {
            $correct_answers = 0;
            $incorrect_answers ++;

        }
        $mark = round(((($correct_answers-($incorrect_answers * 0.5)) / $total_question) * 100),2);

        if ($mark >= 80) {
            $grade = "A";
        } elseif ($mark >= 60 && $mark < 80) {
            $grade = "B";
        } elseif ($mark >= 40 && $mark < 60) {
            $grade = "C";
        } else {
            $grade = "F";
        }

        $results = Result::where('user_id', Auth()->user()->id)
            ->where('exam_id', $exam_id)
            ->forceDelete();

        Result::create([
            'user_id' => Auth()->user()->id,
            'exam_id' => session()->get('exam_id'),
            'grade' => $grade,
            'mark' => $mark,
        ]);
        return view('backend.exams.exam_result', compact('mark', 'grade'));
    }
    public function answer()
    {
        $this->authorize('admin_controller_examinee');

        $id = Auth::id();
        $exam_id =  session()->get('exam_id');

        $records = Record::where('user_id', $id)->where('exam_id', $exam_id)->get();
        return view('backend.exams.exam_answer', compact('records'));
    }
}