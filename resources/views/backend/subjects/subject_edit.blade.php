@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Subject</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject_index') }}">Subject</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>

            </nav>
            <hr>
        </div>

        <form action="{{ route('subject_update', $subject->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

                <label for="name">Subject:</label>
                <input type="text" value="{{ $subject->name }}" id="name" class="form-control mb-3" name="name"
                    placeholder="Enter subject" required>
            </div>
            <div class="form-group">

                <div class="form-group mb-4">
                    <label for="subject_image">Image:</label>
                    <input class="form-control" type="file" name="image" id="subject_image">
                 </div>
            </div>

            <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-file-pen"></i> Update
                Subject</button>


        </form>
    </div>
@endsection
