@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Results</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('result_index') }}">Results</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>


            @if ($results->count() !== 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Exam Name</th>
                        <th>Subject Name</th>
                        <th>Topic Name</th>
                        <th>Grade</th>
                        <th>Marks</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($results as $result)

                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $result->exam->name ?? ''}}</td>
                            <td>{{ $result->exam->subject->name ?? ''}}</td>
                            <td>{{ $result->exam->topic->name ?? '' }}</td>
                            <td>{{ $result->grade ?? '' }}</td>
                            <td>{{ $result->mark ?? '' }}</td>
                            <td>
                                <a href="{{ route('result_show',$result->exam_id) }}" class="btn btn-sm btn-info text-white"><i
                                        class="fa-solid fa-eye"></i> view</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            @else
           <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'You have not participated in any exam till now 😭' }}</h4>
            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Participate</a>
           </div>
            @endif

    </div>
@endsection
