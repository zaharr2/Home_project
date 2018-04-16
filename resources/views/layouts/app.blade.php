<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home_project</title>

    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body>

{{--@if (Route::has('login'))--}}
    {{--<div class="top-right links">--}}
        {{--@auth--}}
            {{--<a href="{{ url('/home') }}">Home</a>--}}
        {{--@else--}}
            {{--<a href="{{ route('login') }}">Login</a>--}}
            {{--<a href="{{ route('register') }}">Register</a>--}}
        {{--@endauth--}}
    {{--</div>--}}
{{--@endif--}}

<div id="app">
    <navbar></navbar>
    <app></app>
    {{--@yield("content")--}}
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
{{--<script>--}}
    {{--import App from "../../assets/js/views/App";--}}

    {{--export default {--}}
        {{--components: {App}--}}
    {{--}--}}
{{--</script>--}}