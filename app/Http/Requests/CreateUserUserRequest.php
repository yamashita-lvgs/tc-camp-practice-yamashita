<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * ユーザーに関するリクエストクラス
 * @package App\Http\Requests
 */
class CreateUserUserRequest extends BaseUserRequest
{
    /**
     * ユーザー登録のバリデーションルール
     * @return バリデートした値
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['login_id'] = [
            'required',
            'eachIncludingHalfWidthCharacter',
            'between:6,14',
            Rule::unique('users'),
        ];
        $rules['mail'] = [
            'required',
            'email',
            'max:255',
            Rule::unique('users'),
        ];
        return $rules;
    }
}
