<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Validation\Rule;

class PastaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(['lunga', 'corta', 'cortissima'])
            ],
            'cooking_time' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:100',
            'description' => 'nullable|max:4096'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'TITOLO OBBLIGATORIO!!!',
            'type.required' => 'TIPO OBBLIGATORIO!!!',
            'cooking_time.required' => 'TEMPO DI COTTURA OBBLIGATORIO!!!',
        ];
    }
}
