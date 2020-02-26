@extends('layouts.all')

@section('title', 'トップ画面')

@section('css', asset('css/top.index.css'))

@section('content')

    <h1>トップ画面</h1>
    <a href="users">ユーザー一覧</a>
    <p>ログイン履歴</p>
    <p>最新のログイン履歴{{ $historyCount }}件まで表示します。</p>
    <table>
        <tr>
            <th>変更日時</th>
            <th>状態</th>
        </tr>
        @foreach($loginHistories as $loginHistory)
            <tr>
                <td>{{ $loginHistory->status_changed_at_screen }}</td>
                <td>{{ $loginHistory->login_status_name }}</td>
            </tr>
        @endforeach
    </table>

@endsection
