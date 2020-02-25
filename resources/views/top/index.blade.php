@extends('layouts.topBase')

@section('title', 'トップ画面')

@section('css', asset('css/top.index.css'))

@section('content')

    <h1>トップ画面</h1>
    <a href="users">ユーザー一覧</a>
    <p>ログイン履歴</p>
    <p>最新の操作{{ $historyCount }}件まで表示します。</p>
    <table>
        <tr>
            <th>ログイン状態変更日時</th>
            <th>ログイン状態</th>
        </tr>
        @foreach($userLoginHistories as $userLoginHistory)
            <tr>
                <td>{{ $userLoginHistory->status_changed_at_screen }}</td>
                <td>{{ $userLoginHistory->login_type_name }}</td>
            </tr>
        @endforeach
    </table>

@endsection
