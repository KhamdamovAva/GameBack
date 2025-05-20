<?php

namespace App\Http\Requests\v1\Desktop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDesktopRequest extends FormRequest
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
            'desktop_type_id' => 'nullable',
            'type' => 'nullable|string',
            'discount' => 'nullable|integer',
            'translations' => 'nullable|array',
            'translations.*.name' => 'string',
            'translations.*.description' => 'string|max:225',
            'price' => 'nullable|numeric|min:0',
            'attributes' => 'nullable|array',
            'attributes.*' => 'nullable',
            'image' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'statuses' => 'nullable|array',
            'statuses.*' => 'integer|in:1,2,3,4',
            'desktop_fps' => 'nullable|array',
        ];
    }
}
