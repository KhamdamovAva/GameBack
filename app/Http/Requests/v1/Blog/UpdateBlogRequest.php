<?php

namespace App\Http\Requests\v1\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'translations.%name%' => 'nullable|string',
            'translations.%description%' => 'nullable|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'video_url' => 'nullable|url'
        ];
    }
}
