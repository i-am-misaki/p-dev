<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '氏名は必ず入力してください',
            'name.max' => '氏名は255文字以内で入力してください',
            'email.required' => 'メールアドレスは必ず入力してください',
            'email.email' => 'メールアドレスが正しい形式ではありません',
            'password.required' => 'パスワードは必ず入力してください',
            'password.regex' => '英数字8文字以上で入力してください'
        ];
    }
}
