<?php

namespace App\Http\Requests;

use App\Rules\LocalizedQuestionExists;
use Illuminate\Foundation\Http\FormRequest;

class GetQuestionRequest extends FormRequest
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
            'question' => ['required', 'string', new LocalizedQuestionExists()],
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
            'question.required' => 'Savol kiritmadingiz!',
            'question.string'   => 'Savol harflardan iborat bo\'lishi kerak!',
            'question.exists'   => 'Bunday so\'z qatnashgan savol topilmadi, iltimos boshqa so\'zlar yordamida izlab ko\'ring! Agar savolni topa olmasangiz, "Ariza qoldirish" bo\'limi orqali ariza qoldiring! Siz bilan operatorlarimiz tez orada bog\'lanishadi!',
        ];
    }
}
