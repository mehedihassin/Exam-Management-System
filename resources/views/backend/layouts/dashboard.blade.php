@extends('backend.master')
<style>
    .clickable-box {
        width: 150px;
        height: 150px;
        background-color: #007bff;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.5s;

    }

    .clickable-box:hover {
        text-decoration: none;
        color: white;
        transform: scale(1.1);
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </nav>
                <hr>
            </div>
            <div class="row  gap-3">

                {{-- accordian start --}}
@php
    $sl = 1
@endphp
                @if ($subjects->count() !== 0)
                <div class="accordion" id="accordionExample">
                @foreach ($subjects as $subject)


                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$subject->id}}" aria-expanded="" aria-controls="collapseOne">
                            <i class="fa-solid fa-book"></i>&nbsp;{{$subject->name}}
                        </button>
                      </h2>
                      <div id="collapseOne{{$subject->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample{{$subject->id}}">
                        <div class="accordion-body">
                           <ul>
                            @foreach ($subject->topics as $topic )
                                <p><i class="fa-solid fa-circle-arrow-right"></i> <a href="{{ route('exam_list',$topic->id) }}">{{$topic->name}}</a></p>
                            @endforeach
                           </ul>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @else
                  <div class="d-flex flex-column justify-content-center align-items-center";">
                      <h4 class="text-center"> {{ 'No subject added yet 😭' }}</h4>
                    @can('admin_controller')
                    <a href="{{ route('subject_create') }}" class=" btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
                        Subject</a>
                    @endcan
                @endif



                  {{-- accordian end --}}



</div>


        </div>
    </div>
@endsection
