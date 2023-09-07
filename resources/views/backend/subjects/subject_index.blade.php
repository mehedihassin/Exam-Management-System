@extends('backend.master')
@section('content')
    <div class="container mt-4">
        <div class="pagetitle">
            <h1>Subject</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject_index') }}">Subject</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>

            </nav>
            <hr>
        </div>


        @if ($subjects->count() !== 0)
        <a href="{{ route('subject_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
            Subject</a>
            <a href="{{ route('subject_trash') }}" class="btn btn-sm btn-primary mb-3 "><i class="fa-solid fa-trash"></i> Trash
                ({{ $count }})</a>
@endif


            @if ($subjects->count() !== 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Subject Name</th>
                        <th>Total Questions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->questions->count() }}</td>
                            <td>
                                <a href="{{ route('subject_show', $subject->id) }}" class="btn btn-sm btn-info text-white"><i
                                        class="fa-solid fa-eye"></i> Show</a>
                                <a href="{{ route('subject_edit', $subject->id) }}" class="btn btn-sm btn-warning text-white"><i
                                        class="fa-solid fa-file-pen"></i> Edit</a>
                                <a href="{{ route('subject_delete', $subject->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            @else
           <div class="d-flex flex-column justify-content-center align-items-center";">
            <h4>{{ 'No subject added yet 😭' }}</h4>
            <a href="{{ route('subject_create') }}" class="btn btn-sm btn-primary mb-3 me-2"> <i class="fa-solid fa-plus"></i> Add
               Subject</a>
           </div>
            @endif

    </div>
@endsection
