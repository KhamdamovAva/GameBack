<?php

namespace App\Http\Requests\v1\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user())],
            'phone' => 'nullable|digits_between:9,12',
            'password' => 'nullable|min:6'
        ];
    }
}
