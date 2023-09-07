@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user_index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>

            </nav>
            <hr>
        </div>

<section>
        <form action="{{ route('user_update',$user->id) }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Name:</label>
                <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="email">Email:</label>
                <input value="{{ $user->email }}" type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="password">Password:</label>
                <input value="{{ $user->password }}" type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="role_id">Role ID:</label>
                <input value="{{ $user->role_id }}" type="number" name="role_id" id="role_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Update User</button>
        </form>
</section>

    </div>
@endsection
