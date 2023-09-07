<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Exam Management System</title>
</head>

<body>
    <section class="container" style="min-height: 100vh;">
        <div class="question_answer">
            <h4 class="my-4 text-center">{{ $records[0]->exam->name }}</h4>
            <h5 class="my-4 text-center">Subject: {{ $records[0]->exam->subject->name }}, ({{ $records[0]->exam->topic->name }})</h5>
            <hr>
            <a href="{{ route('result_question_paper_pdf',$records[0]->exam->id) }}" class="btn btn-primary btn-sm mb-3 me-end"><i class="fa-solid fa-file-pdf"></i> Generate PDF</a>

            @php
                $sl = 1;
            @endphp
            <div class="row mt-3 g-4">
                @foreach ($records as $record)

                       <div class="col-md-6">
                        <div class="card p-4 ">
                            <h6><strong>Q{{ $sl++ }}: {{ $record->question->question }}</strong></h6>
                        <p><strong>Your Answer:</strong>

                                @if ($record->submitted_answer === $record->question->correct_answer)
                                    <span style="color: green;">{{ $record->submitted_answer}}</span> (Correct)
                                @elseif($record->submitted_answer !== $record->question->correct_answer)
                                    <span style="color: red;">{{ $record->submitted_answer }}</span> (Incorrect)
                                  <p><strong>Correct answer:</strong>  <span >{{ $record->question->correct_answer }}</span></p>

                                @else
                                <span>No answer submitted</span>
                            @endif
                        </p>
                        </div>

                       </div>

                @endforeach
            </div>

          </div>
          <a href="{{ route('result_index') }}" class="btn btn-primary btn-sm text-white mt-4"><i class="fa-solid fa-house"></i> Go Back</a>
        </section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>









