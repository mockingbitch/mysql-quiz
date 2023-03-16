<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SQLRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'quiz_number' => 'required',
            'answer' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống!',
            'quiz_number.required' => 'Không được bỏ trống!',
            'answer.required' => 'Không được bỏ trống!'
        ];
    }
}
