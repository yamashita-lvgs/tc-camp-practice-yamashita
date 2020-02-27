@extends('layouts.base')

@section('title', 'ログイン')

@section('css', asset('css/auth.login.css'))

@section('content')

    <h1>ログイン</h1>
    @include('layouts.error',['value'=>'login'])
    <form method="post">
        @csrf
        <table>
            <tr>
                <th>ログインID</th>
                <td>
                    <input type="text" name="login_id" value="{{ old('login_id') }}"><br>
                </td>
            </tr>
            <br>
            <tr>
                <th>パスワード</th>
                <td>
                    <input type="password" name="password"><br>
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="ログインする"></td>
            </tr>
        </table>
    </form>

@endsection
