
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

    <section class="container text-center">
        <div class="row mt-5">
         <div class="col-md-8 mx-auto" >
             <h2 class="text-danger">
                You have already participated in this exam! 😭</h2>
             <form action="{{ route('exam_send_request',$exam->id) }}" method="POST" class="mt-5">
     @csrf
         <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Write a request" required></textarea>

         <button type="submit" class="btn btn-dark  rounded-0 mt-4"><i class="fa-solid fa-paper-plane"></i> Send Request</button>
         <a href="{{ route('dashboard') }}" type="submit" class="btn btn-dark  rounded-0 mt-4"><i class="fa-solid fa-backward"></i> Go Back</a>
        </form>
         </div>
        </div>
        @if(Session::has('alert'))
         <div class="alert alert-warning">
             {{ Session::get('alert') }}
         </div>
     @endif

     </section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>






