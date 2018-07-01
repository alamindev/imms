<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title> 
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">  
        <style type="text/css"> 
      .error{
                width: 100%;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                text-shadow: 1px 2px 3px;
                color: #1b5104;
                overflow-y: hidden;
            }
        </style>   
    </head>
    <body>  
        <div class="error"> 
            <img src="{{ asset('images/404-Error.png') }}" alt="Error img"> 
        </div>
        <!-- for javascript -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  
    </body>
</html>
