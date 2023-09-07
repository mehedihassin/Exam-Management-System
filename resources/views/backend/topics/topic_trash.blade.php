@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Topic</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('topic_index') }}">Topic</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>

            </nav>
            <hr>
        </div>

        <a href="{{ route('topic_index') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-backward"></i> Go
            Back</a>

@if ($topics->count() !== 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL No.</th>
            <th>Subject Name</th>
            <th>Topic Name</th>
            <th>Total Questions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sl = 1;
        @endphp
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $topic->subject->name }}</td>
                <td>{{ $topic->name }}</td>
                <td>{{ $topic->questions->count() }}</td>
                <td>
                    <a href="{{ route('topic_restore', $topic->id) }}" class="btn btn-sm btn-info text-white"><i
                            class="fa-solid fa-window-restore"></i> Restore</a>
                    <a href="{{ route('topic_remove', $topic->id) }}" class="btn btn-sm btn-danger"><i
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
