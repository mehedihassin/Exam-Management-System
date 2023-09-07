@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('role_index') }}">Role</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>


        @if ($roles->count() !== 0)
        <a href="{{ route('role_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
            Role</a>
        @endif
            @if ($roles->count() !== 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Role</th>
                        <th>Role ID</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td class="text-success"><strong>{{ $role->name }}</strong></td>
                            <td>{{ $role->id }}</td>
                            {{-- <td>
                                <a href="{{ route('role_edit', $role->id) }}" class="btn btn-sm btn-warning text-white"><i
                                    class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route('role_delete', $role->id) }}" class="btn btn-sm btn-danger text-white"><i
                                        class="fa-solid fa-trash"></i> Delete</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
           <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'No role added yet 😭' }}</h4>
            <a href="{{ route('role_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
               Role</a>
           </div>
            @endif

    </div>
@endsection
