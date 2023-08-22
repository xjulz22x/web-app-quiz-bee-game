<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/student-assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/student-assets/css/awselect.css')}}">
    <link rel="stylesheet" href="{{asset('assets/student-assets/css/scroll.css')}}">
    <link href="{{asset('assets/student-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Quiz Tournament</title>
</head>

<body class="home">
    <div class="main">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <div id="background_cycler">
        <img class="active" src="{{asset('assets/student-assets/images/bg-home.png')}}" alt="" />
        <img src="{{asset('assets/student-assets/images/bg-home2.png')}}" alt="" />
        <img src="{{asset('assets/student-assets/images/bg-home3.png')}}" alt="" />
        <img src="{{asset('assets/student-assets/images/bg-home4.png')}}" alt="" />
    </div>
<script src="{{asset('assets/student-assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/student-assets/js/awselect.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/student-assets/js/scripts.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/student-assets/js/simple-scrollbar.min.js')}}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>
