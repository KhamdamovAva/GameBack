<?php

namespace App\Http\Requests\v1\Desktop;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesktopRequest extends FormRequest
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
            'desktop_type_id' => 'required',
            'type' => 'required|string',
            'discount' => 'required|integer',
            'translations' => 'required|array',
            'translations.*.name' => 'string',
            'translations.*.description' => 'string|max:225',
            'price' => 'required|numeric|min:0',
            'attributes' => 'nullable|array',
            'attributes.*' => 'required',
            'image' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'statuses' => 'required|array',
            'statuses.*' => 'integer|in:1,2,3,4',
            'desktop_fps' => 'required|array',
        ];
    }
}
