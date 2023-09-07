@extends('backend.master')
@section('content')
    <div class="container">

        <div class="pagetitle">
            <h1>Exam</h1>
            <nav>
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active">{{ $exam->name }}</li>
                </ol>

            </nav>
            <hr>
        </div>

        <h4 class="text-center text-bold">Exam Name: {{$exam->name }} </h4>
        <p class="text-center text-bold"><strong>Sbuject: {{$exam->subject->name }} </strong></p>
        <p class="text-center text-bold"><strong>Level: {{$exam->level }} </strong></p>

        <hr>
        @php
        $sl = 1;
        $questions = $exam->subject->questions;
        $random_questions = $questions->shuffle()->slice(0,$exam->total_question);
    @endphp

        @foreach (  $random_questions as $question )
            @if ($question->question_type == $exam->level)
            <div class="mb-4 mt-4">
                <div class="row">
                    <div class="col-md-12">

                        <p><strong>Q{{ $sl++ }} {{ $question->question }} ({{ $question->question_type }})</strong></p>
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
            @endif
        @endforeach


    </div>

@endsection
