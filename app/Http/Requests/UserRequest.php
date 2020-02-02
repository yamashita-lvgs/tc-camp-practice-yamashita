<?php

    namespace App\Http\Requests;

    use App\Rules\ExtensionValidator;
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
//https://designsupply-web.com/knowledgeside/1640/
        public function rules()
        {
            return [
                'login_id' => 'required|min:8',
                'password' => 'required|min:8',
                'role_id' => 'required',
                'last_name' => 'required',
                'first_name' => 'required',
                'last_name_kana' => 'required|Katakana',
                'first_name_kana' => 'required|Katakana',
                'gender_id' => 'required',
                'mail' => 'required|email',
            ];
        }
    }

