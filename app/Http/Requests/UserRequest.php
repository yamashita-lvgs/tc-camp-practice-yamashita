<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //セキュリティー観点とユーザーが記憶できる観点踏まえて6-14文字
            'login_id' => 'required|between:6,14',
            //IPA推奨とユーザーが記憶できる観点踏まえて8-14文字
            'password' => 'required|between:8,14',
            //必須項目
            'role_id' => 'required',
            //255文字まで（世界一長い人が197文字だから特に規制なし）
            'last_name' => 'required',
            //255文字まで（世界一長い人が197文字だから特に規制なし）
            'first_name' => 'required',
            //255文字まで（世界一長い人が197文字だから特に規制なし）、カタカナ表記
            'last_name_kana' => 'required|Katakana',
            //255文字まで（世界一長い人が197文字だから特に規制なし）、カタカナ表記
            'first_name_kana' => 'required|Katakana',
            //必須項目
            'gender_id' => 'required',
            //作成可能なアドレスは255文字以下のため規制なし、メールアドレスの形であること
            'mail' => 'required|email',
        ];
    }
}

