@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Question</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('question_index') }}">Question</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </nav>
            <hr>
        </div>



       @if ($questions->count() !== 0)
       <a href="{{ route('question_create') }}" class="btn btn-sm btn-primary mb-3 me-2"><i class="fa-solid fa-plus"></i> Add
        Question</a>
    <a href="{{ route('question_trash') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-trash"></i> Trash
        ({{ $count }})</a>

       @endif

       @if ($questions->count() !== 0)
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>Title</th>
                <th>Question Type</th>
                <th>Subject</th>
                <th>Topic</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ ++$sl }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $question->question }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $question->question_type }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $question->subject ? $question->subject->name : '' }}</td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $question->topic ? $question->topic->name : '' }}</td>
                    <td>
                        <a href="{{ route('question_show', $question->id) }}" class="btn btn-sm btn-info text-white"><i
                                class="fa-solid fa-eye"></i> Show</a>
                        <a href="{{ route('question_edit', $question->id) }}"
                            class="btn btn-sm btn-warning text-white"><i class="fa-solid fa-file-pen"></i> Edit</a>
                        <a href="{{ route('question_delete', $question->id) }}"
                            class="btn btn-sm btn-danger text-white"><i class="fa-solid fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach




        </tbody>
    </table>
    {{ $questions->links('pagination::bootstrap-4') }}
    @else
    <div class="d-flex flex-column justify-content-center align-items-center";">
        <h4>{{ 'No question added yet 😭' }}</h4>
        <a href="{{ route('question_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
           Question</a>
       </div>

       @endif


    </div>
@endsection
