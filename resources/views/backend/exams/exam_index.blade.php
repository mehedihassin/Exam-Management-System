@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Exam</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('exam_index') }}">Exam</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>
@if ($exams->count() !== 0)
<a href="{{ route('exam_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
    Exam</a>
<a href="{{ route('exam_trash') }}" class="btn btn-sm btn-primary mb-3 "><i class="fa-solid fa-trash"></i> Trash
    ({{ $count }})</a>

@endif
@if ($exams->count() !== 0)
<div class="table-responsive">
    <table class="table table-bordered text-small">
        <thead>
            <tr>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    SL No.
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Exam
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Subject
                </th>
                    <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        Topic
                    </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    T.Questions
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                   Time(m)
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Level
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Status
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    Actions
                </th>

            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($exams as $exam)
                <tr>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $sl++ }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam->name }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                       {{ $exam->subject->name ?? '' }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam->topic->name ?? '' }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam->total_question }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam->time }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                     {{ $exam->level }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                     {{ $exam->status }}
                    </td>
                    <td>
                    @if ($exam->status == 'inactive')

                        <a href="{{ route('exam_active',$exam->id) }}" class="btn btn-sm btn-info text-white">
                        <i class="fa-solid fa-marker"></i> Create Exam
                        </a>

                    @else

                    <a href="{{ route('exam_inactive',$exam->id) }}" class="btn btn-sm btn-danger text-white">
                        <i class="fa-solid fa-xmark"></i> Cancel Exam
                    </a>


                    @endif
                    @if ($exam->status == 'inactive')
                        <a href="{{ route('exam_edit', $exam->id) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fa-solid fa-file-pen"></i> Edit
                        </a>
                        <a href="{{ route('exam_delete', $exam->id) }}" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>
                    @endif
                    </td>
                </tr>
            @endforeach

            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@else
<div class="d-flex flex-column justify-content-center align-items-center";">
    <h4>{{ 'No exam added yet 😭' }}</h4>
    <a href="{{ route('exam_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
       Exam</a>
   </div>
@endif







    </div>
@endsection
