<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @section('bootstrap')
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="faq/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="faq/css/style.css"> <!-- Resource style -->
        <script src="faq/js/modernizr.js"></script> <!-- Modernizr -->
        @show

        <title>FAQ</title>
    </head>
    <body>
        <ul>
            <li><a href="{{route('login')}}">Вход</a></li>
            <li><a href="{{route('question')}}">Задать вопрос</a></li>
            <li><a href="{{route('home')}}">На главную</a></li>
        </ul>

        @section('head')
        <header>
            <h1>FAQ</h1>
        </header>
        @show

        <section class="cd-faq">
            @section('sidebar')
            <ul class="cd-faq-categories">
                <li><a class="selected" href="#basics">Basics</a></li>
                <li><a href="#mobile">Mobile</a></li>
                <li><a href="#account">Account</a></li>
                <li><a href="#payments">Payments</a></li>
                <li><a href="#privacy">Privacy</a></li>
                <li><a href="#delivery">Delivery</a></li>
            </ul> <!-- cd-faq-categories -->
            @show

            @yield('content')

            <a href="#0" class="cd-close-panel">Close</a>
        </section> <!-- cd-faq -->

        @section('jquery')
        <script src="faq/js/jquery-2.1.1.js"></script>
        <script src="faq/js/jquery.mobile.custom.min.js"></script>
        <script src="faq/js/main.js"></script> <!-- Resource jQuery -->
        @show

    </body>
</html>