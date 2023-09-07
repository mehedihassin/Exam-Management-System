@extends('backend.master')
@section('content')

    <body>
        <div class="container mt-4">
            <div class="pagetitle">
                <h1>Question</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('question_index') }}">Question</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
                <hr>
            </div>
            <form action="{{ route('question_update', $question->id) }}" method="POST">
                @csrf

<div class="row">
    <div class="form-group col-md-6">
        <label for="subject_id">Select Subject:</label>
        <select name="subject_id" id="subject_id" class="form-control mb-1" required>

            <option value="{{ $question->subject ? $question->subject->id : '' }}">
                {{ $question->subject ? $question->subject->name : 'Select One' }}</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        <p><a href="{{ route('subject_create') }}">Add Subject</a></p>
    </div>

    <div class="form-group col-md-6">
        <h5>Select Topic:</h5>
        <select name="topic_id" id="topic_id" class="form-control mb-1" required>
            <option value="{{ $question->topic ? $question->topic->id : '' }}">
                {{ $question->topic ? $question->topic->name : 'Select One' }}</option>
            @foreach ($topics as $topic)

                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
            @endforeach
        </select>
        <p><a href="{{ route('topic_create') }}">Add Topic</a></p>
    </div>

</div>

              <div class="row">
                <div class="form-group col-md-6">
                    <label for="question">Question:</label>
                    <input type="text" value="{{ $question->question }}" class="form-control mb-3" name="question"
                        id="question" placeholder="Enter Question" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="question">Question Type:</label>
                    <select name="question_type" id="question_type" class="form-control" required>
                        <option value="{{ $question->question_type }}">{{ $question->question_type }}</option>
                       <option value="easy">easy</option>
                       <option value="medium">medium</option>
                       <option value="hard">hard</option>
                       <option value="advanced">advanced</option>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="option_1">Option 1:</label>
                    <input type="text" value="{{ $question->option_1 }}" class="form-control mb-3" name="option_1"
                        id="option_1" placeholder="Enter Option 1" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="option_2">Option 2:</label>
                    <input type="text" value="{{ $question->option_2 }}" class="form-control mb-3" name="option_2"
                        id="option_2" placeholder="Enter Option 2" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="option_3">Option 3:</label>
                    <input type="text" value="{{ $question->option_3 }}" class="form-control mb-3" name="option_3"
                        id="option_3" placeholder="Enter Option 3" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="option_4 col-md-6">Option 4:</label>
                    <input type="text" value="{{ $question->option_4 }}" class="form-control mb-3" name="option_4"
                        id="option_4" placeholder="Enter Option 4" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="correct_answer">Correct Answer:</label>
                    <input type="text" value="{{ $question->correct_answer }}" class="form-control mb-3"
                        name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer" required>
                </div>
              </div>
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-file-pen"></i> Update
                    Question</button>
            </form>
        </div>
    @endsection
