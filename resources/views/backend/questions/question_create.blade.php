@extends('backend.master')
@section('content')

    <body>
        <div class="container mt-4">

            <div class="pagetitle mb-4">
                <h1>Question</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('question_index') }}">Question</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </nav>
                <hr>
            </div>


            <form action="{{ route('question_store') }}" method="POST">
                @csrf



                <div class="row">
                    <div class="form-group col-md-6">
                        <h5>Select Subject:</h5>
                        <select name="subject_id" id="subject_id" class="form-control mb-1" required>
                            <option value="" selected disabled>Select One</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        <p><a href="{{ route('subject_create') }}">Add Subject</a></p>
                    </div>
                    <div class="form-group col-md-6">
                        <h5>Select Topic:</h5>
                        <select name="topic_id" id="topic_id" class="form-control" required>
                            <option value="" selected disabled>Select One</option>
                            @foreach ($topics as $topic)

                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                        </select>
                        <p><a href="{{ route('topic_create') }}">Add Topic</a></p>
                    </div>
                </div>
                <div class="question_create" id="question_create">

                    <div class="row border border-1 p-3 mb-3">
                        @php
                            $q = 1;
                        @endphp
                        <h5>Question {{ $q++ }}</h5>
                        <div class="col-md-8">

                            <input type="text" class="form-control mb-3" name="question[]" placeholder="Enter Question"
                                required>
                        </div>
                        <div class="col-md-4 ">

                            <select name="question_type[]" class="form-control" id="" required>
                                <option value="easy">easy</option>
                                <option value="medium">medium</option>
                                <option value="hard">hard</option>
                                <option value="advanced">advanced</option>
                            </select>
                        </div>
                        <div class="col-md-6">

                            <input type="text" class="form-control mb-3" name="option_1[]" placeholder="Enter Option 1"
                                required>
                        </div>
                        <div class="col-md-6">

                            <input type="text" class="form-control mb-3" name="option_2[]" placeholder="Enter Option 2"
                                required>
                        </div>
                        <div class="col-md-6">

                            <input type="text" class="form-control mb-3" name="option_3[]" placeholder="Enter Option 3"
                                required>
                        </div>
                        <div class="col-md-6">

                            <input type="text" class="form-control mb-3" name="option_4[]" placeholder="Enter Option 4"
                                required>
                        </div>
                        <div class="col-md-12">

                            <input type="text" class="form-control mb-3" name="correct_answer[]"
                                placeholder="Enter Correct Answer" required>

                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-danger btn-sm w-100"><i class="fa-solid fa-trash"></i> Remove question</a>
                        </div>

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-primary btn-sm w-100" id="add_question_btn" onclick="addMoreQuestion()"><i
                                class="fa-solid fa-plus"></i>
                            Add More Question</a>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save
                            Question</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            let count = 1;

            function updateQuestionCount() {
                let questionCountElements = document.querySelectorAll('.question-count');
                questionCountElements.forEach((element, index) => {
                    element.textContent = `Question ${index + 2}`;
                });
            }

            function addMoreQuestion() {
                let newQuestionDiv = document.createElement('div');
                newQuestionDiv.className = 'row border border-1 p-3 mb-3';

                newQuestionDiv.innerHTML = `
                    <h5 class="question-count">Question ${count}</h5>
                    <div class="col-md-8">

<input type="text" class="form-control mb-3" name="question[]" placeholder="Enter Question"
    required>
</div>
<div class="col-md-4 ">

<select name="question_type[]" class="form-control" id="">
    <option value="easy">easy</option>
    <option value="medium">medium</option>
     <option value="hard">hard</option>
    <option value="advanced">advanced</option>
</select>
</div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="option_1[]" placeholder="Enter Option 1" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="option_2[]" placeholder="Enter Option 2" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="option_3[]" placeholder="Enter Option 3" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="option_4[]" placeholder="Enter Option 4" required>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control mb-3" name="correct_answer[]" placeholder="Enter Correct Answer" required>
                    </div>

                    <div class="col-md-3">
                        <a class="btn btn-danger btn-sm w-100" onClick="deleteDiv(this)"><i class="fa-solid fa-trash"></i> Remove question</a>
                    </div>
                `;

                document.getElementById('question_create').appendChild(newQuestionDiv);
                updateQuestionCount();
                count++;
            }

            const deleteDiv = (btn) => {
                btn.parentNode.parentNode.parentNode.removeChild(btn.parentNode.parentNode);
                updateQuestionCount();
                count--;
            }
        </script>
    @endsection
