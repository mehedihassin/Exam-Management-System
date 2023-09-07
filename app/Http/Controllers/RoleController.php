<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $roles = Role::all();
        return view('backend.roles.role_index', compact('roles'));
    }
    public function create()
    {
        $this->authorize('admin');
        $roles = Role::all();
        return view('backend.roles.role_create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->authorize('admin');
        Role::create($request->all());
        toastr()->success('Role added successfully!', 'Congrats');
        return redirect()->route('role_index');
    }
    // public function edit($id)
    // {
    //     $this->authorize('admin');
    //     $role = Role::find($id);
    //     return view('backend.roles.role_edit', compact('role'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $this->authorize('admin');
    //     Role::find($id)->update($request->except('_token'));
    //     toastr()->success('Role updated successfully!', 'Congrats');
    //     return redirect()->route('role_index');
    // }

    // public function delete($id)
    // {
    //     $this->authorize('admin');
    //     Role::find($id)->delete();
    //     toastr()->error('Role deleted!', 'Warning');
    //     return redirect()->back();
    // }
}
