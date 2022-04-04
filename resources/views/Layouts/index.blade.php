<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HapoLearn</title>
    <link rel="shortcut icon" href="https://res.cloudinary.com/derrfxjxx/image/upload/v1646625166/icon_owl_ebeado.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="{{asset('app/slick/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('app/slick/slick/slick.css')}}">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
{{--    <link rel="stylesheet" href="scss/home/courses.scss">--}}
</head>

<body>
@include('Layouts.header')
@yield('content')
@include('Layouts.footer')
@include('Layouts.message')
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
{{--<script src="{{asset('app/slick/slick/slick.js')}}"></script>--}}
<script src="{{asset('js/app.js')}}"></script>
</html>
