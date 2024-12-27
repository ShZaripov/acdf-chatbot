<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
            'question_uz' => 'required|string',
            'question_ru' => 'required|string',
            'images_uz.*' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'images_ru.*' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'question_uz.required' => 'Savol(UZ) matni bo\'sh bo\'lishi mumkin emas',
            'question_ru.required' => 'Savol(RU) matni bo\'sh bo\'lishi mumkin emas',
            'images_uz.*.mimes'    => 'Har bir rasm quyidagi formatlardan biri bo\'lishi kerak: jpeg, jpg, png, svg, gif.',
            'images_uz.*.max'      => 'Har bir rasm hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}
