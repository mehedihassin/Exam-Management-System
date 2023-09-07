@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('role_index') }}">Role</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
            <hr>
        </div>


        <form action="{{ route('role_update',$role->id) }}" method="POST">
            @csrf
           <div class="form-group mb-2">
            <label for="role" class="form-group">Role Name:</label>
            <input value="{{ $role->name }}" type="text" id="role" class="form-control" name="name" placeholder="Enter Role"
                required>
           </div>

           <div class="form-group mb-2">
            <label for="role" class="form-group">Role ID:</label>
            <input value="{{ $role->number }}" type="number" id="role" class="form-control" name="number" placeholder="Enter Role ID"
                required>
           </div>
            <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-floppy-disk"></i> Update
                Role</button>
        </form>
    </div>
@endsection
