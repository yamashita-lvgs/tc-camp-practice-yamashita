<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * ユーザー登録に関するリクエストクラス
 * @package App\Http\Requests
 */
class CreateUserRequest extends BaseUserRequest
{
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
