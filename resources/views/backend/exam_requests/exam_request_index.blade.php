@extends('backend.master')
@section('content')

    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Exam Request</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('exam_request_index') }}">Exam Request</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>
@if ($exam_requests->count() !== 0)

{{-- <a href="{{ route('exam_trash') }}" class="btn btn-sm btn-primary mb-3 "><i class="fa-solid fa-trash"></i> Trash
    ({{ $count }})</a> --}}

@endif
@if ($exam_requests->count() !== 0)
<div class="table-responsive">
    <table class="table table-bordered text-small">
        <thead>
            <tr>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    SL No.
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                   User
                </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                   Email
                 </th>
                <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                   Exam
                </th>
                    <th style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                       Message
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
            @foreach ($exam_requests as $exam_request)
                <tr>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $sl++ }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam_request->user->name ?? '' }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam_request->user->email ?? '' }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                       {{ $exam_request->exam->name ?? '' }}
                    </td>
                    <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $exam_request->message ?? '' }}
                    </td>
                    <td>
                        <a href="{{ route('exam_request_show',$exam_request->exam->id) }}" class="text-white btn btn-sm btn-sm btn-info"><i
                            class="fa-solid fa-eye"></i> Show</a>
                        <a href="{{ route('exam_request_accept',$exam_request->id) }}" class="text-white btn btn-sm btn-primary"><i class="fa-solid fa-circle-check"></i> Accept</a>
                        <a href="{{ route('exam_request_edit',$exam_request->id) }}" class="text-white btn btn-sm btn-warning"><i
                            class="fa-solid fa-file-pen"></i> Edit</a>
                        <a href="{{ route('exam_request_reject',$exam_request->id) }}" class="text-white btn btn-sm btn-danger"><i class="fa-solid fa-ban"></i> Reject</a>

                    </td>
                </tr>
            @endforeach

            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@else
<div class="d-flex flex-column justify-content-center align-items-center";">
    <h4>{{ 'No request 😎' }}</h4>
</div>
@endif







    </div>
@endsection
