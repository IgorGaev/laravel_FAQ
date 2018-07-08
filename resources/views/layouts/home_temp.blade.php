<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="faq/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="faq/css/style.css"> <!-- Resource style -->
        <script src="faq/js/modernizr.js"></script> <!-- Modernizr -->
        <title>FAQ</title>
    </head>
    <body>

         @yield('header')

        <section class="cd-faq">
            
             @yield('sidebar')

             @yield('content')
            
            <a href="#0" class="cd-close-panel">Close</a>
        </section> <!-- cd-faq -->
        <script src="faq/js/jquery-2.1.1.js"></script>
        <script src="faq/js/jquery.mobile.custom.min.js"></script>
        <script src="faq/js/main.js"></script> <!-- Resource jQuery -->
    </body>
</html>