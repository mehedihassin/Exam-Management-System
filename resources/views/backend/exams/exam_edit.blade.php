@extends('backend.master')
@section('content')

    <body>
        <div class="container mt-4">

            <div class="pagetitle mb-4">
                <h1>Exam</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('exam_index') }}">Exam</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
                <hr>
            </div>

            <form action="{{ route('exam_update', $exam->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="examName">Exam Name:</label>
                        <input type="text" value="{{ $exam->name }}" name="name" class="form-control" id="examName"
                            placeholder="Enter Exam Name" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="level">Subject:</label>
                        <select class="form-control" name="subject_id" id="subject" required>
                            <option value="{{ $exam->subject->id ?? '' }}">{{ $exam->subject->name ?? 'Select One' }}</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        <p><a href="{{ route('subject_create') }}">Add Subject</a></p>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="level">Topic:</label>
                        <select class="form-control" name="topic_id" id="topic" required>
                            <option value="{{ $exam->topic->id ?? '' }}">{{ $exam->topic->name ?? 'Select One' }}</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                        </select>
                        <p><a href="{{ route('subject_create') }}">Add Topic</a></p>
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="totalQuestions">Total Questions:</label>
                        <input type="number" value="{{ $exam->total_question }}" name="total_question" class="form-control"
                            id="totalQuestions" placeholder="Enter Total Questions" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="level">Time (in minutes):</label>
                        <input value="{{ $exam->time }}" type="number" name="time" id="time" class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="level">Level:</label>
                        <select class="form-control" name="level" id="level" required>
                            <option value="{{ $exam->level }}">{{ $exam->level }}</option>
                            <option value="easy">easy</option>
                            <option value="medium">medium</option>
                            <option value="hard">hard</option>
                            <option value="advanced">advanced</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="{{ $exam->status }}">{{ $exam->status }}</option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk"></i> Update
                    Exam</button>
            </form>
        </div>
    @endsection
