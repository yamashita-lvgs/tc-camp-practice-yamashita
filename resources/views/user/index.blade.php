<!doctype html>
<html lang="ja">
<head>
  <title>ユーザー情報</title>
  <link rel="stylesheet"  href="{{asset('css/styles.css')}}">
</head>
<body>
  <h1>ユーザー一覧</h1>
  <a href="users/create">新規ユーザー登録</a>
  <table>
    <tr>
      <th>名前</th>
      <th>権限</th>
      <th>メールアドレス</th>
      <th></th>
      <th></th>
    </tr>
    @foreach($users as $user)
      <tr>
        <td>{{$user->last_name." ". $user->first_name}}</td>
        <td>ここに権限名いれる</td>
        <td>{{$user->email}}</td>
        <td><a href="users/user->id/edit">更新</a></td>
        <td><a href="users/user->id/delete">削除</a></td>
      </tr>
    @endforeach
  </table>
  <h1>ユーザー情報操作履歴</h1>
  <table>
    <tr>
      <th>操作日時</th>
      <th>操作対象ユーザー</th>
      <th>操作実施ユーザー</th>
      <th>操作種別</th>
    </tr>
    @foreach($userActionHistories as $userActionHistory)
      <tr>
        <td>userActionHistory->actioned_at</td>
        <td>{{$userActionHistory->actioned_user->last_name}} {{$userActionHistory->actioned_user->first_name}}</td>
        <td>{{$userActionHistory->actioning_user->last_name}} {{$userActionHistory->actioning_user->first_name}}</td>
        <td>userActionHistory->content_id</td>
      </tr>
    @endforeach
  </table>
</body>
</html>
