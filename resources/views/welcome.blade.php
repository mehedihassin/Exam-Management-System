<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <title>Exam Management System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <style>
            /* Add your custom CSS here */

        </style>
    </head>
    <body class="d-flex align-items-center justify-content-center min-vh-100">
        @if (Route::has('login'))
            <div class="position-fixed  top-0 end-0 p-4 text-end" style="z-index: 10;">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-weight-semibold btn btn-outline-primary  text-gray-600 text-decoration-none">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary  btn-  font-weight-semibold text-gray-600 text-decoration-none">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary ms-4 font-weight-semibold text-gray-600 text-decoration-none">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container text-center">
            <img width="150" src="{{ asset('img/logo.png') }}" alt="Exam Management System">
            <h1 class="text-dark mt-4" ><strong class="text-primary" style='font-size: 48px'>EXAM MANAGEMENT SYSTEM</strong></h1>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
