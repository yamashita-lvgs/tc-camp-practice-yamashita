<!doctype html>
<html lang="ja">
    <head>
        <title>ユーザー新規登録完了</title>
    <!--
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
-->
    </head>
    <body>
        <h1>ユーザー新規登録完了</h1>
        <table>
            <tr>
                <th>ログインID</th>
                <th>役割</th>
                <th>名前</th>
                <th>シメイ</th>
                <th>性別</th>
                <th>メールアドレス</th>
            </tr>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->full_name }}</td>
                <td>カナシメイ</td>
                <td>性別</td>
                <td>{{ $user->mail }}</td>
            </tr>
        </table>
    </body>
</html>

