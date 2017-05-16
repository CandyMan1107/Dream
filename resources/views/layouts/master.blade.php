<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>作家のヘヤ</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/slick.css">
        <link rel="stylesheet" type="text/css" href="/css/slick-team-slider.css"/>
        <link rel="stylesheet" href="/css/style.css">

        <!--GOOGLE MATERIAL ICON-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--JHM STYLE-->
        <link rel="stylesheet" href="/css/jhm-style.css">
    </head>
    <body>
      @include('partials.header')
      @yield('content')
      @include('partials.footer')
    </body>
</html>
