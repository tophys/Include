<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Include@ - @yield('titulo')</title>
        <link rel="icon" href="{{asset('/images/logo-icon.png')}}">
        <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Pacifico">
        <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{asset('/css/dashboard-style.css')}}" />
        @yield('plugins')
    </head>
    <body>
        @include('layouts.nav')

        @include('layouts.sidebar')
        
        @yield('conteudo')
    </body>
</html>