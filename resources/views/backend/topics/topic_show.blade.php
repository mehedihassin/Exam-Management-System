@extends('backend.master')
@section('content')
    <div class="container">
        <div class="pagetitle">
            <h1>Topic</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('topic_index') }}">Topic</a></li>
                    <li class="breadcrumb-item active">{{ $topic->name }}</li>
                </ol>

            </nav>
            <hr>
        </div>


        <h4 class="text-center text-bold mb-3"> Question Bank</h4>
        <div class="row">
            <div class="col-md-6">
               <strong> <p>Subject: {{ $topic->subject->name }}</p></strong>
            </div>
            <div class="col-md-6 text-end">
               <strong> <p>Topic: {{ $topic->name }}</p></strong>
            </div>

        </div>
        <hr>
        @if ($questions->count() !== 0)
            @php
                $q = 1;
            @endphp
            @foreach ($questions as $question)
                <div class="mb-4 mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <p><strong>Q{{ $q++ }}. {{ $question->question }}
                                    ({{ $question->question_type }})
                                </strong></p>
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
            @endforeach
        @else
        <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'No question added yet 😭' }}</h4>
            <a href="{{ route('question_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
               Question</a>
           </div>
        @endif

    </div>
    {{$questions->links('pagination::bootstrap-4')}}

@endsection
