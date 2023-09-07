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
    <section class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row">
          <div class="col-md-12 text-center">
              <h1>Your score is: {{ $mark }}</h1>
              <h5>Your Grade is {{ $grade }}
            @if($grade == 'A')
            {{ '😎' }}
            @elseif ($grade == 'B')
            {{ '🙂' }}
            @elseif ($grade == 'C')
            {{ '🤔' }}
            @else
            {{ '😭' }}
            @endif
            </h5>
              <a href="{{ route('exam_answer') }}" class="btn btn-primary btn-sm mt-4">View Answer</a>
          </div>
        </div>

      </section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>





