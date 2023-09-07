<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;




class SubjectController extends Controller
{
    public function index()
    {
        $this->authorize('admin_controller');
        $count =   Subject::onlyTrashed()->count();
        $subjects =  Subject::all();

        return view('backend.subjects.subject_index', compact('subjects', 'count'));
    }
    public function create()
    {
        $this->authorize('admin_controller');
        return view('backend.subjects.subject_create');
    }
    public function store(Request $request)
    {
        $this->authorize('admin_controller');
        try {
            $data = $request->all();
            if ($request->image) {
                $image = $this->uploadImage($request->name, $request->image);
                $data['image'] = $image;
            }

            Subject::create($data);
            toastr()->success('Subject added successfully!', 'Congrats');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('subject_index');
    }
    public function delete($id)
    {
        $this->authorize('admin_controller');
        Subject::find($id)->delete();
        toastr()->error('Subject deleted!', 'Warning');
        return redirect()->back();
    }
    public function edit($id)
    {
        $this->authorize('admin_controller');
        $subject =  Subject::find($id);
        return view('backend.subjects.subject_edit', compact('subject'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('admin_controller');

        try {
            $data = $request->except('_token');

            if ($request->hasFile('image')) {
                $subject = Subject::where('id', $id)->first();

                $this->unlink($subject->image);

                $data['image'] = $this->uploadImage($request->name, $request->image);
            }
            Subject::where('id', $id)->update($data);
            toastr()->success('Subject updated successfully!', 'Congrats');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('subject_index');
    }
    public function trash()
    {
        $this->authorize('admin_controller');
        $subjects = Subject::onlyTrashed()->get();

        return view('backend.subjects.subject_trash', compact('subjects'));
    }
    public function restore($id)
    {
        $this->authorize('admin_controller');
        Subject::withTrashed()->find($id)->restore();
        toastr()->success('Subject restored successfully!', 'Congrats');
        return redirect()->back();
    }
    public function remove($id)
    {
        $this->authorize('admin_controller');
        $subject = Subject::withTrashed()->find($id);

        if ($subject->image) {
            $this->unlink($subject->image);
        }

        $subject->forceDelete();
        toastr()->error('Subject permanently deleted!', 'Warning');
        return redirect()->back();
    }
    public function show($id)
    {
        $this->authorize('admin_controller');
        $subject = Subject::find($id);
        // $questions = Question::where('subject_id', $id)->get();
        $questions = $subject->questions()->paginate(10);
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;

        return view('backend.subjects.subject_show', compact('subject', 'questions', 'sl'));
    }

    //image function
    //image upload function
    public function uploadImage($title, $image)
    {

        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());


        $file_name = $timestamp . '-' . $title . '.' . $image->getClientOriginalExtension();

        $pathToUpload = storage_path() . '/app/public/subjects/';  // image  upload application save korbo

        if (!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);
        }

        Image::make($image)->resize(286, 180)->save($pathToUpload . $file_name);

        return $file_name;
    }
    //image unlink function
    private function unlink($image)
    {
        $pathToUpload = storage_path() . '/app/public/subjects/';
        if ($image != '' && file_exists($pathToUpload . $image)) {
            @unlink($pathToUpload . $image);
        }
    }
}
