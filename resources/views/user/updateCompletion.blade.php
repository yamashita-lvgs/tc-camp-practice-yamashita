@extends('user.base')

@section('title', 'ユーザー更新完了')

@section('content')

    <h1>ユーザー更新完了</h1>
    <table>
        <tr>
            <th>ユーザーID</th>
            <th>ログインID</th>
            <th>役割</th>
            <th>名前</th>
            <th>名前（カナ）</th>
            <th>性別</th>
            <th>メールアドレス</th>
        </tr>
        <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->login_id }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->full_name_kana }}</td>
            <td>{{ $user->gender_name }}</td>
            <td>{{ $user->mail }}</td>
        </tr>
    </table>
    <br>
    <a href="/users">
        <button type="button">ユーザー一覧画面に戻る</button>
    </a>

@endsection
