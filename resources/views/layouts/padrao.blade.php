<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Include@ - @yield('titulo')</title>
        <link rel="icon" href="../images/logo-icon.png">
        <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Pacifico">
        <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        @yield('plugins')
    </head>
    <body>
        @extends('layouts.nav')

        @extends('layouts.sidebar')
        
        @yield('conteudo')
    </body>
</html>