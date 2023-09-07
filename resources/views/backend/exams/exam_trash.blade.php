@extends('backend.master')
@section('content')
    <div class="container mt-4">

        <div class="pagetitle">
            <h1>Exam</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('exam_index') }}">Exam</a></li>
                    <li class="breadcrumb-item active">Trash</li>
                </ol>
            </nav>
            <hr>
        </div>

        <a href="{{ route('exam_index') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-backward"></i> Go
            Back</a>
@if ($exams->count() !== 0)
<table class="table table-bordered table-responsive">
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
    </thead>
    <tbody>
        @php
            $sl = 1;
        @endphp
        @foreach ($exams as $exam)
            <tr>
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
                    <a href="{{ route('exam_restore', $exam->id) }}" class="btn btn-sm btn-info text-white"><i
                            class="fa-solid fa-window-restore"></i>
                        Restore</a>
                    <a href="{{ route('exam_remove', $exam->id) }}" class="btn btn-sm btn-danger text-white"><i
                            class="fa-solid fa-trash"></i>
                        Permanent
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
