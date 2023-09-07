@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Topic</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('topic_index') }}">Topic</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>

            </nav>
            <hr>
        </div>

        <form action="{{ route('topic_update',$topic->id) }}" method="POST">
            @csrf
          <div class="subject mb-3">
            <select name="subject_id" id="subject" class="form-control">
                <option value="{{$topic->subject->id}}" selected >{{ $topic->subject->name }}</option>
                   @foreach ($subjects as $subject )
                       <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                   @endforeach
               </select>
          </div>

           <div class="form-group">
            <label for="topic" class="form-group mb-2">Topic Name:</label>
            <input value="{{ $topic->name }}" type="text" id="topic" class="form-control mb-3" name="name" placeholder="Enter topic"
                required>
           </div>

            <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-floppy-disk"></i> Update
                Topic</button>


        </form>
    </div>
@endsection
