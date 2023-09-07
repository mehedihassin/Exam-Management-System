@extends('backend.master')
@section('content')

    <div class="container">
        <div class="pagetitle">
            <h1>Exam Request</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('exam_request_index') }}">Exam Request</a></li>
                    <li class="breadcrumb-item active">{{ $exam_request->exam->name }}</li>
                </ol>

            </nav>
            <hr>
        </div>


        <div class="card">
            <div class="card-header">
                Exam Name: {{ $exam_request->exam->name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Subject Name: {{ $exam_request->exam->subject->name }}</h5>
                <p class="card-text">Request message: {{ $exam_request->message }}</p>
                <a href="{{ route('exam_request_accept',$exam_request->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-circle-check"></i> Accept</a>
                <a href="{{ route('exam_request_edit',$exam_request->id) }}" class="text-white btn btn-sm btn-warning"><i
                    class="fa-solid fa-file-pen"></i> Edit</a>
                <a href="{{ route('exam_request_reject',$exam_request->id) }}" class="text-white btn btn-sm btn-danger"><i class="fa-solid fa-ban"></i> Reject</a>
                <a href="{{ route('exam_request_index') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-backward"></i> Go Back</a>
            </div>
        </div>
    </div>


@endsection
