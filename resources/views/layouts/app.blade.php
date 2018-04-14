<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home_project</title>

    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif

<div class="container-fluid" id="app">
    <navbar></navbar>
    <div class="container">
        @yield("content")
    </div>
</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>