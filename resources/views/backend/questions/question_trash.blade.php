@extends('backend.master')
@section('content')
    <div class="container mt-4">

        <div class="pagetitle">
            <h1>Question</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('question_index') }}">Question</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>
            </nav>
            <hr>
        </div>

        <a href="{{ route('question_index') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-backward"></i> Go
            Back</a>
@if ($questions->count() !== 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL No.</th>
            <th>Title</th>
            <th>Subject</th>
            <th>Topic</th>
            <th>Question Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sl = 1;
        @endphp
        @foreach ($questions as $question)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->subject ? $question->subject->name : '' }}</td>
                <td>{{ $question->topic->name }}</td>
                <td>{{ $question->question_type }}</td>
                <td>
                    <a href="{{ route('question_restore', $question->id) }}"
                        class="btn btn-sm btn-info text-white"><i class="fa-solid fa-window-restore"></i>
                        Restore</a>
                    <a href="{{ route('question_remove', $question->id) }}"
                        class="btn btn-sm btn-danger text-white"><i class="fa-solid fa-trash"></i> Permanent
                        Delete</a>
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
