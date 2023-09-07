@extends('backend.master')
@section('content')

<div class="container mt-4">
        <div class="pagetitle">
            <h1>Exam Request</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('exam_request_index') }}">Exam Request</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
            <hr>
        </div>


{{-- <a href="{{ route('exam_trash') }}" class="btn btn-sm btn-primary mb-3 "><i class="fa-solid fa-trash"></i> Trash
    ({{ $count }})</a> --}}





<form action="{{route('exam_request_update',$examinee->id)}}" method="POST">
@csrf
@method('PATCH')

    <div class="row mb-3">
        <div class="form-group mb-3">
            <label for="time">Exam Time (minutes):</label>
            <input placeholder="Enter Exam Time" value="{{$examinee->time}}" class="form-control"  type="number" name="time" id="time" placeholder="Enter time">
        </div>

        <div class="form-group">
            <label for="status">Status: </label>
            <input value="{{$examinee->status}}" class="form-control"   type="number" name="status" id="status" placeholder="Status">
        </div>
    <input type="hidden" name="exam_id" value={{$examinee->exam_id}}>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Update</button>
</form>




</div>
@endsection
