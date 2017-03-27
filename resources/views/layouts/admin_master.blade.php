<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" href="{{URL::to('images/logo.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
    @yield('styles')
    <link rel="stylesheet" href="{{URL::to('css/nav_bar.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
    @yield('content')
    
    @include('partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{URL::to('js/Controller.js')}}"></script>
    <script src="{{URL::to('js/script.js')}}"></script>
    @yield('scripts')
</body>
</html>