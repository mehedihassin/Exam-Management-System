<?php

namespace App\Http\Controllers;

use App\Models\Subject;



class BackendController extends Controller
{
    public function dashboard()
    {
        $this->authorize('admin_controller_examinee');
        $subjects = Subject::all();
        return view('backend.layouts.dashboard', compact('subjects'));
    }
}
