<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="zakumpanje official website">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="{{ asset('images/logo.png')}}">
        
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
                
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/bootstrap-icons.css') }}" rel="stylesheet">

        <link href="{{ asset('css/templatemo-festava-live.css')}}" rel="stylesheet">

        <link href="{{ asset('css/rowl.carousel.min.css')}}" rel="stylesheet">

        <link href="{{ asset('css/rowl.theme.default.min.css')}}" rel="stylesheet">

        <link href="{{ asset('css/rowl.rtemplatemo-pod-talk.css')}}" rel="stylesheet">



        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
                crossorigin="anonymous">
        </script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="mb-5" >
            @include('components.navbar')
        </header>

        @yield('content')


    </body>
</html>
