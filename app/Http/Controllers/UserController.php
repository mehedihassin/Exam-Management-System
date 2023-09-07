<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $users = User::all();
        return view('backend.users.user_index', compact('users'));
    }
    public function create()
    {
        $this->authorize('admin');
        return view('backend.users.user_create');
    }
    public function store(Request $request)
    {
        $this->authorize('admin');
        User::create($request->all());
        toastr()->success('User added successfully!', 'Congrats');
        return redirect()->route('user_index');
    }
    public function edit($id)
    {
        $this->authorize('admin');
        $user = User::find($id);
        return view('backend.users.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        User::find($id)->update($request->except('_token'));
        toastr()->success('User updated successfully!', 'Congrats');
        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $this->authorize('admin');
        User::find($id)->delete();
        toastr()->error('User deleted!', 'Warning');
        return redirect()->back();
    }
}