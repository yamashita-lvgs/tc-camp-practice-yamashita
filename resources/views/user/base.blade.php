<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="content-language" content="ja">
        <meta charset="UTF-8">
        <meta name="keywords" content="ユーザー,ユーザー操作履歴">
        <meta name="description" content="ユーザー情報一覧及びその登録更新削除">
        <meta name="robots" content="noindex,nofollow">
        <meta name="author" content="yamashita">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @section('sidebar')
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
