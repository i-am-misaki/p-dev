<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'learningName' => ['required', 'string', 'max:50', 'unique:learning_data,name'] ,
            'studyHour' => ['required', 'regex:/^[0-]+$/'],
            
        ];
    }

    public function messages()
    {
        return[
            'learningName.required' => '項目名は必ず入力してください',
            'learningName.max' => '項目名は50文字以内で入力してください',
            'learningName.unique' => ':inputは既に登録されています',
            'studyHour.required' => '学習時間は必ず入力してください',
            'studyHour.regex' => '学習時間は0以上の数字で入力してください',
        ];
    }
}
