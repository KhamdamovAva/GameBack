<?php

namespace App\Http\Requests\v1\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'brand_id' => is_numeric($this->brand_id) ? (int) $this->brand_id : null,
            'category_id' => is_numeric($this->category_id) ? (int) $this->category_id : null,
        ]);
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
            'translations.*.description' => 'required_with:translations.name|max:255',

            'images' => 'required|array',
            'images.*' => 'mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|numeric|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'type' => 'required|string',

            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'statuses' => 'required|array',
            'attributes' => 'required|array',
        ];
    }
}
