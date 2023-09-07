@extends('backend.master')
@section('content')
    <div class="container">
        <div class="pagetitle">
            <h1>Question</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('question_index') }}">Question</a></li>
                    <li class="breadcrumb-item active">
                        {{ $question->subject ? $question->subject->name : 'Unknown Category' }}</li>
                </ol>
            </nav>
            <hr>
        </div>


        <h4>Question:</h4>
        {{--
One to Many relationship between subjects table and questions table
parent: subjects table
child: questions table
--}}

        <div class="mb-4 mt-4">
            <div class="row">
                <div class="col-md-12">

                    <p><strong>Q. {{ $question->question }} ({{ $question->question_type }})</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">A. {{ $question->option_1 }}</li>
                        <li class="list-group-item">B. {{ $question->option_2 }}</li>
                        <li class="list-group-item">C. {{ $question->option_3 }}</li>
                        <li class="list-group-item">D. {{ $question->option_4 }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        Correct Answer:
                        @if ($question->correct_answer === $question->option_1)
                            {{ 'A.' }}
                        @elseif ($question->correct_answer === $question->option_2)
                            {{ 'B.' }}
                        @elseif ($question->correct_answer === $question->option_3)
                            {{ 'C.' }}
                        @elseif ($question->correct_answer === $question->option_4)
                            {{ 'D.' }}
                        @endif
                        {{ $question->correct_answer }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
