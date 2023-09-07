<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Exam Management System</title>
</head>
<body>
    <section class="container">
        <div class="mb-4 mt-4" class="exam-start-page">


            <div class="row exam_start_heading sticky-top bg-white">
                <h4 class="text-center text-bold mb-3">{{ $exam->name }}</h4>
                <h5 class="text-center text-bold mb-3">Subject: {{ $exam->subject->name}} ({{ $exam->topic->name }})</h5>
               <p class="text-danger text-center mb-4">*Don't refresh the page*</p>
                <div class="col-md-2">
                    <div class=" ">
                        <strong>Time:</strong> <span id="timer"><strong>{{ $examinee_0->time ?? $exam->time }}</strong></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" "><strong>Mark/Correct Answer:</strong> <span ><strong> {{$exam->total_question * 1 }}</strong></span></div>

                </div>
                <div class="col-md-4">
                    <div class=" "><strong>Negative Mark/Incorrect Answer:</strong> <span ><strong> 0.5</strong></span></div>

                </div>
                <div class="col-md-2">
                    <p class=" "><strong>Level: {{ $exam->level }} </strong></p>
                </div>
                <hr>
            </div>


            @php
                $sl = 1;
            @endphp
               <form action="{{ route('exam_submit') }}" method="POST" id="exam_form" class="mb-4">
                @csrf
                <div class="row">
                    @foreach ($random_questions as $question)

                    <div class="col-md-6">
                        <p><strong>Q{{ $sl++ }}. {{ $question->question }}({{ $question->question_type }})</strong></p>
                        <ul class="answer_list">
                            <li class="list-group-item">
                                <label for="radio_{{ $question->id }}_option_1">
                                    <input id="radio_{{ $question->id }}_option_1" name="answer[{{ $question->id }}]" type="radio" value="{{ $question->option_1 }}"> {{ $question->option_1 }}</input>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label for="radio_{{ $question->id }}_option_2">
                                    <input id="radio_{{ $question->id }}_option_2" name="answer[{{ $question->id }}]" type="radio" value="{{ $question->option_2 }}"> {{ $question->option_2 }}</input>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label for="radio_{{ $question->id }}_option_3">
                                    <input id="radio_{{ $question->id }}_option_3" name="answer[{{ $question->id }}]" type="radio" value="{{ $question->option_3 }}"> {{ $question->option_3 }}</input>
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label for="radio_{{ $question->id }}_option_4">
                                    <input id="radio_{{ $question->id }}_option_4" name="answer[{{ $question->id }}]" type="radio" value="{{ $question->option_4 }}"> {{ $question->option_4 }}</input>
                                </label>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <input type="number" name="total_question" value="{{$exam->total_question}}" hidden>
                    <button type="submit" class="btn btn-primary btn-sm" id="submit_btn">Submit Answer</button>
               </form>
        </div>
    </section>

    <!-- exam.blade.php -->
<script>
       var timeLimitInMinutes = @json($examinee_0->time ?? $exam->time);




        var timeLimitInSeconds = timeLimitInMinutes * 60;
        var timerElement = document.getElementById('timer');
        var submitBtn = document.getElementById('submit_btn');

        function startTimer() {
          timeLimitInSeconds--;
          var minutes = Math.floor(timeLimitInSeconds / 60);
          var seconds = timeLimitInSeconds % 60;

          if (timeLimitInSeconds < 0) {
            timerElement.textContent = '00:00';
            clearInterval(timerInterval);
            submitBtn.click();
            return;
          }

          if (minutes < 10) {
            minutes = '0' + minutes;
          }
          if (seconds < 10) {
            seconds = '0' + seconds;
          }

          timerElement.textContent = minutes + ':' + seconds;
        }

        var timerInterval = setInterval(startTimer, 1000);

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>











