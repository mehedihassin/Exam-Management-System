@extends('backend.master')
@section('content')


    <div class="container mt-4">
        <div class="pagetitle">
            <h1>All Examinee</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('all_result_index') }}">All Results</a></li>
                    <li class="breadcrumb-item active">All Examinee</li>
                </ol>

            </nav>
            <hr>
        </div>


            @if ($examinees->count() !== 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Examinee</th>
                        <th>Email</th>
                        <th>Mark</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($examinees as $examinee)

                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $examinee->user->name }}</td>
                            <td>{{ $examinee->user->email }}</td>
                            <td>{{ $examinee->user->results->where('exam_id',$examinee->exam_id)->first()->mark }}</td>
                            <td>{{ $examinee->user->results->where('exam_id',$examinee->exam_id)->first()->grade }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            @else
           <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'There is no examinee 😭' }}</h4>

           </div>
            @endif

    </div>
@endsection
