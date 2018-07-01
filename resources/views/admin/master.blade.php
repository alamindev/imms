<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title> 
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">   
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
        @yield('style')
        <!--Import Google Icon Font-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body> 
        <!-- includes for header -->
        @include('admin.includes.header')

        <!-- includes for side nav -->
        @include('admin.includes.sidenav')
        <!-- main part -->
        <div class="wrpper"> 
            <div class="container">
        <!-- inlcude breadcrumb -->
        @include('admin.includes.breadcrumb') 

        <!-- add main content dynamicly -->
        @yield('main-content')
        
            </div>
        </div> <!-- end wrapper -->

        <!-- include footer -->
        @include('admin.includes.footer') 

        <!-- for javascript -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  
        <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script> 
        @yield('script')
    </body>
</html>
