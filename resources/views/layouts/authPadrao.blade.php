<!DOCTYPE html>
<html lang="pt-br">
<head>    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Include@ - @yield('titulo')</title>
    <link rel="icon" sizes="192x192" href="images/puzzle.png">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Pacifico'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel="stylesheet" href="css/style.css">
    
</head>
<body class="login-body">

    @yield('conteudo')
    
</body>
</html>
