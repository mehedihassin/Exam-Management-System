@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Subject</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject_index') }}">Subject</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>

            </nav>
            <hr>
        </div>

        <a href="{{ route('subject_index') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-backward"></i> Go
            Back</a>

@if ($subjects->count() !== 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL No.</th>
            <th>Subject Name</th>
            <th>Total Questions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sl = 1;
        @endphp
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->questions->count() }}</td>
                <td>
                    <a href="{{ route('subject_restore', $subject->id) }}" class="btn btn-sm btn-info text-white"><i
                            class="fa-solid fa-window-restore"></i> Restore</a>
                    <a href="{{ route('subject_remove', $subject->id) }}" class="btn btn-sm btn-danger"><i
                            class="fa-solid fa-trash"></i> Permanent Delete</a>

                </td>
            </tr>
        @endforeach





    </tbody>
</table>
@else
<h4 class="text-center">{{ 'No junk file ☺️' }}</h4>
@endif




    </div>
@endsection
