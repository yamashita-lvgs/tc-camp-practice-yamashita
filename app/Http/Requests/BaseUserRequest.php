<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ユーザーに関するベースリクエストクラス
 * @package App\Http\Requests
 */
abstract class BaseUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            //セキュリティー観点とユーザーが記憶できる観点踏まえて6-14英数字
            'login_id' => [
                'required',
                'eachIncludingHalfWidthCharacter',
                'between:6,14',
            ],
            //IPA推奨とユーザーが記憶できる観点踏まえて8-14英数字
            'password' => [
                'required',
                'eachIncludingHalfWidthCharacter',
                'between:8,14',
            ],
            //必須項目
            'role_id' => [
                'required',
                'integer',
            ],
            //255文字まで（世界一長い人が197文字だから特に規制なし）
            'last_name' => [
                'required',
                'max:255',
            ],
            //255文字まで（世界一長い人が197文字だから特に規制なし）
            'first_name' => [
                'required',
                'max:255',
            ],
            //255文字まで（世界一長い人が197文字だから特に規制なし）、カタカナ表記
            'last_name_kana' => [
                'required',
                'katakana',
                'max:255',
            ],
            //255文字まで（世界一長い人が197文字だから特に規制なし）、カタカナ表記
            'first_name_kana' => [
                'required',
                'katakana',
                'max:255',
            ],
            //必須項目
            'gender_id' => [
                'required',
                'integer',
            ],
            //作成可能なアドレスは255文字以下のため規制なし、メールアドレスの形であること
            'mail' => [
                'required',
                'email',
                'max:255',
            ],
        ];
    }
}
