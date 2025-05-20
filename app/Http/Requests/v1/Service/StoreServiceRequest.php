<?php

namespace App\Http\Requests\v1\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'translations' => 'required|array',
            'translations.*.name' => 'required|string',
            'translations.*.type' => 'required|string',
            'translations.*.description' => 'required|string|max:255',
            'translations.*.status' => 'required|string',
            'translations.*.services' => 'required|string',

            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
