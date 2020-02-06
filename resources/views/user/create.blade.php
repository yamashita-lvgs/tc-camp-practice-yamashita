<!doctype html>
<html lang="ja">
<head>
    <title>ユーザー新規登録</title>
<!--
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
-->
</head>
<body>
<h1>ユーザー新規登録</h1>
<table>
    <form method="post">
        {{ csrf_field() }}
        <tr>
            <th>ログインID</th>
            <td><input type="text" name="login_id" value="{{old('login_id')}}"></td>
            @if ($errors->has('login_id'))
                <td>{{$errors->first('login_id')}}</td>
            @endif
        </tr>
        <br>
        <tr>
            <th>パスワード</th>
            <td><input type="text" name="password" value="{{old('password')}}"></td>
            @if ($errors->has('password'))
                <td>{{$errors->first('password')}}</td>
            @endif
        </tr>
        <tr>
            <th>役割</th>
            <td>
                <select name="role_id" value="{{old('role_id')}}" required>
                    <option value="">選択してください。</option>
                    <option value="1">{{ $roles[0]->name }}</option>
                    <option value="2">{{ $roles[1]->name }}</option>
                    <option value="3">{{ $roles[2]->name }}</option>
                </select>
            </td>
        </tr>
        <br>
        <tr>
            <th>氏名</th>
            <td>姓<input type="text" name="last_name" value="{{old('last_name')}}"></td>
            @if ($errors->has('last_name'))
                <td>{{$errors->first('last_name')}}</td>
            @endif
            <td>名<input type="text" name="first_name" value="{{old('first_name')}}"></td>
            @if ($errors->has('first_name'))
                <td>{{$errors->first('first_name')}}</td>
            @endif
        </tr>
        <br>
        <tr>
            <th>シメイ</th>
            <td>セイ<input type="text" name="last_name_kana" value="{{old('last_name_kana')}}"></td>
            @if ($errors->has('last_name_kana'))
                <td>{{$errors->first('last_name_kana')}}</td>
            @endif
            <td>メイ<input type="text" name="first_name_kana" value="{{old('first_name_kana')}}"></td>
            @if ($errors->has('first_name_kana'))
                <td>{{$errors->first('first_name_kana')}}</td>
            @endif
        </tr>
        <br>
        <tr>
            <th>性別</th>
            <td>
                    <input type="radio" name="gender_id" value="1">{{ $genders[1] }}
                    <input type="radio" name="gender_id" value="2">{{ $genders[2] }}
                    <input type="radio" name="gender_id" value="0">{{ $genders[0] }}
            </td>
            @if ($errors->has('gender_id'))
                <td>{{$errors->first('gender_id')}}</td>
            @endif
        </tr>
        <br>
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="mail" value="{{old('mail')}}"></td>
            @if ($errors->has('mail'))
                <td>{{$errors->first('mail')}}</td>
            @endif
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="登録"></td>
        </tr>
    </form>
</table>
</body>
</html>

