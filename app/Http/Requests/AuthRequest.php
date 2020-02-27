<?php
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

/**
 * 認証に関するに関するリクエストクラス
 * @package App\Http\Requests
 */
class AuthRequest extends FormRequest
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

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $inputLoginId = $validator->getData()['login_id'];
            $inputPassword = $validator->getData()['password'];
            if (!User::authUser($inputLoginId, $inputPassword)) {
                return $validator->errors()->add('login', '入力に誤りがあります。');
            }
        });
    }
}
