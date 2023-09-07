@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Subject</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject_index') }}">Subject</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>

            </nav>
            <hr>
        </div>


        <form action="{{ route('subject_store') }}" method="POST" enctype="multipart/form-data">
            @csrf


           <div class="form-group mb-2">
            <label for="subject" class="form-group">Subject Name:</label>
            <input type="text" id="subject" class="form-control" name="name" placeholder="Enter subject"
                required>
           </div>
             <div class="form-group mb-4">
                <label for="subject_image">Image:</label>
                <input class="form-control" type="file" name="image" id="subject_image">
             </div>

            <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save
                Subject</button>


        </form>
    </div>
@endsection
