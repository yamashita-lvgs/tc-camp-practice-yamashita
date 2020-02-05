<!doctype html>
<html lang="ja">
    <head>
        <title>ユーザー一覧</title>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body>
        <h1>ユーザー一覧</h1>
        <a href="users/create">新規ユーザー登録</a>
        <p>最大{{$historyCount}}件まで表示します。</p>
        <table>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>役割</th>
                <th>メールアドレス</th>
                <th>登録者</th>
                <th>登録日時</th>
                <th>更新者</th>
                <th>更新日時</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->role->name}}</td>
                    <td>{{ $user->mail }}</td>
                    <td>{{ $user->created_user_id }}</td>
                    <td>{{ $user->updated_at_screen }}</td>
                    <td>{{ $user->updated_user_id }}</td>
                    <td>{{ $user->updated_at_screen }}</td>
                    <td><a href="users/{{$user->id}}/edit">更新</a></td>
                    <td><a href="users/{{$user->id}}/delete">削除</a></td>
                </tr>
            @endforeach
        </table>
        <h1>ユーザー情報操作履歴</h1>
        <p>最新の操作{{$historyCount}}件まで表示します。</p>
        <table>
            <tr>
                <th>操作日時</th>
                <th>操作種別</th>
                <th>操作対象ユーザー</th>
                <th>操作実施ユーザー</th>
            </tr>
            @foreach($userOperationHistories as $userOperationHistory)
                <tr>
                    <td>{{ $userOperationHistory->operating_user->updated_at_screen }}</td>
                    <td>{{ $userOperationHistory->operation_name}}</td>
                    <td>{{ $userOperationHistory->operating_user->full_name }} </td>
                    <td>{{ $userOperationHistory->operated_user->full_name }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
