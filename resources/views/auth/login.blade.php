@extends('layouts.authBase')

@section('title', 'ユーザーログイン')

@section('css', asset('css/auth.signin.css'))

@section('content')

    <h1>ユーザーログイン</h1>
    <p>{{ $message ?? '' }}</p>
    <form method="post">
        @csrf
        <table>
                <tr>
                    <th>ログインID</th>
                    <td>
                        <input type="text" name="login_id" value="{{ old('login_id') }}"><br>
                        <p1>半角英数字記号を各1回以上用いて、6-14文字で入力して下さい。</p1><br>
                        <p1>※半角記号は[-,!,/]など正規表現の文字が使用できます。</p1>
                    </td>
                    <td>
                        @include('layouts.error',['value'=>'login_id'])
                    </td>
                </tr><br>
                <tr>
                    <th>パスワード</th>
                    <td>
                        <input type="password" name="password"><br>
                        <p1>半角英数字記号を各1回以上用いて、8-14文字で入力して下さい。</p1>
                    </td>
                    <td>
                        @include('layouts.error',['value'=>'password'])
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="ログインする"></td>
                </tr>
        </table>
    </form>
@endsection
