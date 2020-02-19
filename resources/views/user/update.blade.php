@extends('user.base')

@section('title', 'ユーザー更新')

@section('css', asset('css/user.insert.css'))

@section('content')

    <h1>ユーザー更新</h1>
    <table>
        <form method="post">
            @csrf
            <input type="hidden" name="id" value="{{ old('id') }}">
            <tr>
                <th>ログインID</th>
                <td>
                    <input type="text" name="login_id" value="{{ old('login_id', $user->login_id) }}">
                    <br>
                    <p1>半角英数字記号を各1回以上用いて、6-14文字で入力して下さい。</p1>
                    <br>
                    <p1>※半角記号は[-,!,/]など正規表現の文字が使用できます。</p1>
                </td>
                <td>
                    @if($errors->has('login_id'))
                        @foreach($errors->get('login_id') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>パスワード</th>
                <td>
                    <input type="password" name="password">
                    <br>
                    <p1>半角英数字記号を各1回以上用いて、8-14文字で入力して下さい。</p1>
                </td>
                <td>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th>役割</th>
                <td>
                    <select name="role_id" value="{{old('role_id')}}" required>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}"
                                    @if( old('role_id', $user->role->id) == $key ) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    @if($errors->has('role_id'))
                        @foreach($errors->get('role_id') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>姓</th>
                <td><input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"></td>
                <td>
                    @if($errors->has('last_name'))
                        @foreach($errors->get('last_name') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>名</th>
                <td><input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"></td>
                <td>
                    @if($errors->has('first_name'))
                        @foreach($errors->get('first_name') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>姓（カナ）</th>
                <td>
                    <input type="text" name="last_name_kana" value="{{old('last_name_kana', $user->last_name_kana)}}">
                    <br>
                    <p1>(カタカナで入力してください。)</p1>
                </td>
                <td>
                    @if($errors->has('last_name_kana'))
                        @foreach($errors->get('last_name_kana') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th>名（カナ）</th>
                <td>
                    <input type="text" name="first_name_kana" value="{{old('first_name_kana', $user->first_name_kana)}}">
                    <br>
                    <p1>(カタカナで入力してください。)</p1>
                </td>
                <td>
                    @if($errors->has('first_name_kana'))
                        @foreach($errors->get('first_name_kana') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>性別</th>
                <td>
                    @foreach($genders as $key => $gender)
                        <input type="radio" name="gender_id" value="{{ $key }}"
                               @if (old('gender_id', "$user->gender_id") == $key) checked="checked" @endif>
                        {{ $gender }}
                    @endforeach
                </td>
                <td>
                    @if($errors->has('gender_id'))
                        @foreach($errors->get('gender_id') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <br>
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" name="mail" value="{{old('mail',$user->mail)}}"></td>
                <td>
                    @if($errors->has('mail'))
                        @foreach($errors->get('mail') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="更新"></td>
            </tr>
        </form>
    </table>

@endsection
