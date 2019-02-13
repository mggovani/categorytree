<!-- start: HEAD -->
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
<!--    {!! Html::style('assets/plugins/node-waves/waves.css') !!}
    {!! Html::style('assets/plugins/animate-css/animate.css') !!}
    {!! Html::style('assets/css/themes/all-themes.css') !!}-->
    @yield('style')

    <!-- end: MAIN CSS -->
    <!-- start: Theme CSS -->
    {!! Html::style('assets/css/zabuto_calendar.css') !!}
    {!! Html::style('lib/gritter/css/jquery.gritter.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/css/style-responsive.css') !!}
    <!-- end: Theme CSS -->
    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <!-- <link rel="shortcut icon" href="/favicon_1.ico"/> -->
       
</head>
<!-- end: HEAD -->