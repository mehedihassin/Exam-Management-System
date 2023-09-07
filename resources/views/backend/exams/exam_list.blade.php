@extends('backend.master')
@section('content')
    <div class="container mt-4">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Exam List</li>
                </ol>
            </nav>
            <hr>
        </div>
        @if ($exams->count() !== 0)
       @can('admin_controller')
       <a href="{{ route('exam_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
        Exam</a>
       @endcan
        @endif

            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary mb-3"><i class="fa-solid fa-backward"></i> Go
                Back</a>

        <div class="exam_list row gap-3">
            @if ($exams->count() !== 0)
                    @foreach ($exams as $exam)

                    <div class="card col-md-4" style="width: 18rem;" >
                        <img class="card-img-top" src="{{ asset('storage/subjects/'. $exam->subject->image) ?? '' }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$exam->name}}</h5>
                          <p class="card-text"><strong>Subject:</strong> {{ $exam->subject->name ?? '' }}</p>
                          <p class="card-text"><strong>Topic:</strong> {{ $exam->topic->name ?? '' }}</p>
                          <p class="card-text"><strong>Total question:</strong> {{ $exam->total_question }}</p>
                          <p class="card-text"> <strong>Time:</strong> {{ $exam->time }} minutes</p>
                          <p class="card-text"><strong>Level:</strong>  {{ $exam->level }}</p>
                          <a href="{{ route('exam_start',$exam->id) }}" class="btn btn-sm btn-primary text-white">
                            <i class="fa-solid fa-play"></i> Start Exam
                        </a>
                        </div>
                      </div>
                    @endforeach
                @else
             <div class="d-flex flex-column justify-content-center align-items-center";">
                <h4 class="text-center"> {{ 'There is no exam now 😎' }}</h4>
               @can('admin_controller')
               <a href="{{ route('exam_index') }}" class=" btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-list"></i> Exam List</a>
               @endcan
             </div>

            @endif

        </div>
        {{ $exams->links('pagination::bootstrap-4') }}



    </div>
@endsection
