<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * ユーザー更新に関するリクエストクラス
 * @package App\Http\Requests
 */
class UpdateUserRequest extends BaseUserRequest
{
    public function rules()
    {
        $user = $this->route()->parameters['id'];
        $rules = parent::rules();
        $rules['login_id'] = [
            'required',
            'eachIncludingHalfWidthCharacter',
            'between:6,14',
            Rule::unique('users')->ignore($user),
        ];
        $rules['mail'] = [
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user),
        ];
        return $rules;
    }
}
