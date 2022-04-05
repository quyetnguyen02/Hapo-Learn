<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HapoLearn</title>
    <link rel="shortcut icon" href="https://res.cloudinary.com/derrfxjxx/image/upload/v1646625166/icon_owl_ebeado.png">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
</head>

<body>
@include('Layouts.header')
@yield('content')
@include('Layouts.footer')
@include('Layouts.message')
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>
