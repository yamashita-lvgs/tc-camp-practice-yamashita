<!doctype html>
<html lang="ja">
<head>
    <style type="text/css">
        table, td, th { border: 1px #2b2b2b solid; width:1100px}
    </style>
    <title>ユーザー情報</title>
</head>
<body>
<h1>ユーザー情報</h1>
<h2>登録ユーザー情報一覧</h2>
<a href="users/create">新規ユーザー登録</a>
<table>
    <tr>
        <th>ユーザーID</th>
        <th>性</th>
        <th>名</th>
        <th>セイ</th>
        <th>メイ</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name_kana}}</td>
            <td>{{$user->first_name_kana}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->email}}</td>
            <td><a href="users/user->id/edit">更新</a></td>
            <td><a href="users/user->id/delete">削除</a></td>
        </tr>
    @endforeach
</table>
</br>

<h2>ユーザー情報操作履歴</h2>
<table>
    <tr>
        <th>操作日時</th>
        <th>操作対象ユーザー</th>
        <th>操作種別</th>
        <th>操作実施ユーザー</th>
    </tr>
    @foreach($userActionHistories as $userActionHistory)
        <tr>
            <td>{{$userActionHistory->actioned_at}}</td>
            <td>{{$userActionHistory->user->last_name}}</td>
            <td>{{$userActionHistory->content_id}}</td>
            <td>{{$userActionHistory->actioned_user_id}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
