@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user_index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>


        @if ($users->count() !== 0)
        <a href="{{ route('user_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
            User</a>
        @endif
            @if ($users->count() !== 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Role</th>
                        <th>Role ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($users as $user)

                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-success">{{ $user->role->name }}</span></td>
                            <td>{{ $user->role->id }}</td>
                            <td>
                                <a href="{{ route('user_edit', $user->id) }}" class="btn btn-sm btn-warning text-white"><i
                                    class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route('user_delete', $user->id) }}" class="btn btn-sm btn-danger text-white"><i
                                        class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
           <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'No user added yet 😭' }}</h4>
            <a href="{{ route('user_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
               User</a>
           </div>
            @endif

    </div>
@endsection
