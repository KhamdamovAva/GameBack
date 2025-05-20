<?php

namespace App\Http\Requests\v1\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'translations' => 'nullable|array',
            'translations.*.name' => 'nullable|string',
            'translations.*.type' => 'nullable|string',
            'translations.*.description' => 'nullable|string|max:255',
            'translations.*.status' => 'nullable|string',
            'translations.*.services' => 'nullable|string',

            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
