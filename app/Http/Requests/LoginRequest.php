<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 認証に関するに関するリクエストクラス
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
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
        ];
    }
}
