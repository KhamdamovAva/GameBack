<?php

namespace App\Http\Requests\v1\Currency;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
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
            'currency' => 'nullable|string',
            'conversions' => 'nullable|min:1|integer'
        ];
    }
    protected function prepareForValidation()
    {
        $this->replace($this->only(['currency', 'conversions']));
    }
}
