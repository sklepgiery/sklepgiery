<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config("app.name")}} - Panel - @yield('title')</title>
    </head>
    <body>
        <div class="content dashboard">
            @yield('content')
        </div>
    </body>
</html>
