<?php

namespace App\Http\Requests\v1\DeliveryMethod;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryMethodRequest extends FormRequest
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
            'price' => 'nullable|integer',
            'estimated_delivery_time' => 'nullable|integer',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
