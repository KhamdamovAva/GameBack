<?php

namespace App\Http\Requests\v1\DeliveryMethod;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryMethodRequest extends FormRequest
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
            'price' => 'required|integer',
            'estimated_delivery_time' => 'required|integer',
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
