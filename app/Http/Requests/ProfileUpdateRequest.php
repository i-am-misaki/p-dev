<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'introduction' => ['required', 'string', 'max:200', 'min:50'] ,
        ];
    }

    public function messages()
    {
        return[
            'introduction.required' => '自己紹介は必ず入力してください',
            'introduction.max' => '自己紹介は50文字以上200文字以下で入力してください',
            'introduction.min' => '自己紹介は50文字以上200文字以下で入力してください',
            'images' => 'array|max:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function introduction(): string
    {
        return $this->input('introduction');
    }
}
