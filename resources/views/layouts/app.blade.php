<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <title>@yield('title')</title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- end: META -->
    <!-- start: GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Ruda" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
<!--    {!! Html::style('bower_components/DataTables/media/css/jquery.dataTables.min.css') !!}
    {!! Html::style('bower_components/DataTables/media/css/dataTables.bootstrap.min.css') !!}-->
    {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('bower_components/themify-icons/themify-icons.css') !!}
    {!! Html::style('bower_components/flag-icon-css/css/flag-icon.min.css') !!}
    {!! Html::style('bower_components/animate.css/animate.min.css') !!}
    {!! Html::style('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') !!}
    {!! Html::style('bower_components/switchery/dist/switchery.min.css') !!}
    {!! Html::style('bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css') !!}
    {!! Html::style('bower_components/ladda/dist/ladda-themeless.min.css') !!}
    {!! Html::style('bower_components/slick.js/slick/slick.css') !!}
    {!! Html::style('bower_components/slick.js/slick/slick-theme.css') !!}
    <!-- {!! Html::style('assets/plugins/node-waves/waves.css') !!}
    {!! Html::style('assets/plugins/animate-css/animate.css') !!}
    {!! Html::style('assets/css/themes/all-themes.css') !!} -->
    @yield('style')

    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- end: MAIN CSS -->
    <!-- start: Theme CSS -->
    {!! Html::style('assets/css/styles.css') !!}
    {!! Html::style('assets/css/plugins.css') !!}
    <!-- end: Theme CSS -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png"/>
       
</head>
    <body class="login" style="background-image: url(./assets/img/bg_home.jpg); background-position:center;
background-repeat:no-repeat;height: 100%; width: 100%">
        <div class="wrap-content container" id="container">
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
         @include('include.script')  
    </body>
    
</html>
