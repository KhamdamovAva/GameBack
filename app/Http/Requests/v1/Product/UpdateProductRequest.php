<?php

namespace App\Http\Requests\v1\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'translations.*.name' => 'nullable|string',
            'translations.*.description' => 'required_with:translations.name|max:255',

            'images' => 'nullable|array',
            'images.*' => 'mimes:png,jpg,jpeg|max:2048',
            'price' => 'nullable|numeric|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'type' => 'nullable|string',

            'brand_id' => 'nullable',
            'category_id' => 'nullable',
            'attributes' => 'nullable|array',
            'status_id' => 'nullable|array',
        ];
    }
}
