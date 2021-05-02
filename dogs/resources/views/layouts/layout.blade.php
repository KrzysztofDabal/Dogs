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
            <a href="http://127.0.0.1:8000/">Home</a>
            <a href="http://127.0.0.1:8000/notices/">Ogłoszenia</a>
            <a href="http://127.0.0.1:8000/notices/creat/">Dodaj Ogłoszenie</a>
        </div>

    </div>
        @yield('content')

    <footer>Copyright 2021 Dogo House</footer>
    </body>
</html>
