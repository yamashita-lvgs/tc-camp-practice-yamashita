<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="content-language" content="ja">
        <meta charset="UTF-8">
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href= @yield('css') >
    </head>
    <body>
        @section('sidebar')
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
