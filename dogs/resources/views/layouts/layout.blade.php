<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
    <div class="flex-center position-ref">

        <div class="links">
            <a href="{{ route('index') }}">Home</a>
            <a href="{{ route('notices') }}">Ogłoszenia</a>
            <a href="{{ route('regulations') }}">Regulamin</a>
            <a href="{{ route('description') }}">O stronie</a>
        </div>

    </div>
        @yield('content')

    <footer>Copyright 2021 Dogo House</footer>
    </body>
</html>
