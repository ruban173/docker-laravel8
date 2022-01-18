<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
         'login'=>'required|unique:users|min:4|max:30',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:8|max:20',
         'repeat_password'=>'same:password',
        ];
    }

    public function messages()
{
    return [
        'login.required' => 'Поле не заполнено',
        'login.unique' => 'Такой логин существует',
        'login.min' => 'Логин должен содержать от 4 до 30 символов',
        'login.max' => 'Логин должен содержать от 4 до 30 символов',
        
        'email.required' => 'Поле не заполнено',
        'email.email' => 'Не является почтой',
        'email.unique' => 'Такой email используется',
     

        'password.required' => 'Поле не заполнено',
        'password.min' => 'Пароль должен содержать от 8 до 20 символов',
        'password.max' => 'Пароль должен содержать от 8 до 20 символов',

        'repeat_password.same' => 'Пароли не соответствуют',
    ];
}
}
