<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Topic;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $this->authorize('admin_controller');
        $count =   Topic::onlyTrashed()->count();
        $topics =  Topic::all();

        return view('backend.topics.topic_index', compact('topics', 'count'));
    }
    public function create()
    {
        $this->authorize('admin_controller');

        $subjects = Subject::all();
        return view('backend.topics.topic_create', compact('subjects'));
    }
    public function store(Request $request)
    {
        $this->authorize('admin_controller');
        try {

            Topic::create($request->all());
            toastr()->success('Topic added successfully!', 'Congrats');
            return redirect()->route('topic_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function delete($id)
    {
        $this->authorize('admin_controller');
        Topic::find($id)->delete();
        toastr()->error('Topic deleted!', 'Warning');
        return redirect()->back();
    }
    public function edit($id)
    {
        $this->authorize('admin_controller');
        $subjects = Subject::all();
        $topic =  Topic::find($id);
        return view('backend.topics.topic_edit', compact('topic', 'subjects'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('admin_controller');

        try {
            Topic::find($id)->update($request->all());
            toastr()->success('Topic updated successfully!', 'Congrats');
            return redirect()->route('topic_index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function trash()
    {
        $this->authorize('admin_controller');

        $topics = Topic::onlyTrashed()->get();

        return view('backend.topics.topic_trash', compact('topics'));
    }
    public function restore($id)
    {
        $this->authorize('admin_controller');
        Topic::withTrashed()->find($id)->restore();
        toastr()->success('Topic restored successfully!', 'Congrats');
        return redirect()->back();
    }
    public function remove($id)
    {
        $this->authorize('admin_controller');
        Topic::withTrashed()->find($id)->forceDelete();
        toastr()->error('Topic permanently deleted!', 'Warning');
        return redirect()->back();
    }
    public function show($id)
    {
        $this->authorize('admin_controller');
        $topic = Topic::find($id);
        // $questions = Question::where('subject_id', $id)->get();
        // $questions = $subject->questions;
      $questions = Question::where('subject_id',$topic->subject_id)->where('topic_id',$topic->id)->paginate(10);



        return view('backend.topics.topic_show', compact('topic', 'questions'));
    }
}