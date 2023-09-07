@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('role_index') }}">Role</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
            <hr>
        </div>

        <form action="{{ route('role_store') }}" method="POST">
            @csrf
           <div class="form-group mb-2">
            <label for="role" class="form-group">Role Name:</label>
            <input type="text" id="role" class="form-control" name="name" placeholder="Enter Role"
                required>
           </div>

            <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save
                Role</button>
        </form>
    </div>
@endsection
