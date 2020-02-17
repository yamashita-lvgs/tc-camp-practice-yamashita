@extends('user.base')

@section('title', 'ユーザー更新')

@section('css', asset('css/user.create.css'))

@section('content')

    <h1>ユーザー更新</h1>
    <table>
        <form method="post">
            @csrf
            <tr>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <th>ログインID</th>
                <td>
                    <input type="text" name="login_id" value="{{ $user->login_id }}">

                    {{old('login_id')}}
                    <br>
                    <p1>(6-14文字の半角英数字記号で入力してください。)</p1>
                </td>
                @if ($errors->has('login_id'))
                    <td>{{$errors->first('login_id')}}</td>
                @endif
            </tr>
            <br>
            <tr>
                <th>パスワード</th>
                <td>
                    <input type="text" name="password" value="{{ $user->password }}">
                    <br>
                    <p1>(8-14文字の半角英数字記号で入力してください。)</p1>
                </td>
                @if ($errors->has('password'))
                    <td>{{$errors->first('password')}}</td>
                @endif
            </tr>
            <tr>
                <th>役割</th>
                <td>
                    <select name="role_id" value="{{ 'role_id' }}" required>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}"
                                    @if( old('role_id', $user->role->id) == $key ) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <br>
            <tr>
                <th>姓</th>
                <td><input type="text" name="last_name" value="{{ $user->last_name }}"></td>
                @if ($errors->has('last_name'))
                    <td>{{$errors->first('last_name')}}</td>
                @endif
            </tr>
            <br>
            <tr>
                <th>名</th>
                <td><input type="text" name="first_name" value="{{ $user->first_name }}"></td>
                @if ($errors->has('first_name'))
                    <td>{{$errors->first('first_name')}}</td>
                @endif
            </tr>
            <br>
            <tr>
                <th>セイ</th>
                <td>
                    <input type="text" name="last_name_kana" value="{{ $user->last_name_kana }}">
                    <br>
                    <p1>(カタカナで入力してください。)</p1>
                </td>
                @if ($errors->has('last_name_kana'))
                    <td>{{$errors->first('last_name_kana')}}</td>
                @endif
            </tr>
            <tr>
                <th>メイ</th>
                <td>
                    <input type="text" name="first_name_kana" value="{{ $user->first_name_kana }}">
                    <br>
                    <p1>(カタカナで入力してください。)</p1>
                </td>
                @if ($errors->has('first_name_kana'))
                    <td>{{$errors->first('first_name_kana')}}</td>
                @endif
            </tr>
            <br>
            <tr>
                <th>性別</th>
                <td>
                    @if( old('gender_id') == $key ) selected @endif
                    @foreach($genders as $key => $value)
                        <input type="radio" name="gender_id" value="{{ $key }}" @if (old('gender_id', "$user->gender_id") == $key) checked="checked" @endif>
                            {{ $value }}
                    @endforeach

                </td>
                @if ($errors->has('gender_id'))
                    <td>{{$errors->first('gender_id')}}</td>
                @endif
            </tr>
            <br>
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" name="mail" value="{{$user->mail}}"></td>
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
@endsection
