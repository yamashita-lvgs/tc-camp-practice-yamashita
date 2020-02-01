<!doctype html>
<html lang="ja">
<head>
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
<h1>ユーザー新規登録</h1>
<form method="post">

    {{ csrf_field() }}
    <tr>
        <th>ログインID:</th>
        <td><input type="text" name="login_id" value="{{old('login_id')}}"></td>
        @if ($errors->has('name'))
            <td>{{$errors->first('name')}}</td>
        @endif
    </tr>
    <tr>
        <th>パスワード:</th>
        <td><input type="text" name="password" value="{{old('password')}}"></td>
        @if ($errors->has('name'))
            <td>{{$errors->first('password')}}</td>
        @endif
    </tr>
    <tr>
        <th>姓:</th>
        <td><input type="text" name="password" value="{{old('last_name')}}"></td>
        @if ($errors->has('last_name'))
            <td>{{$errors->first('last_name')}}</td>
        @endif
    </tr>
    <tr>
        <th>姓:</th>
        <td><input type="text" name="password" value="{{old('last_name')}}"></td>
        @if ($errors->has('last_name'))
            <td>{{$errors->first('last_name')}}</td>
        @endif
    </tr>

        $table->string('last_name',255)->comment("姓");
        $table->string('first_name',255)->comment("名");
        $table->string('last_name_kana',255)->comment("セイ");
        $table->string('first_name_kana',255)->comment("メイ");
        $table->tinyInteger('gender_id')->comment("性別");
        $table->string('email', 255)->unique()->comment("メールアドレス");


</form>

</body>
</html>
