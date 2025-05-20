<?php

namespace App\Http\Requests\v1\Review;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'translations.*.comment' => 'nullable|string',
            'translations.*.profession' => 'nullable|string',
            'fullname' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240'
        ];
    }
}
