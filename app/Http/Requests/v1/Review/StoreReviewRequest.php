<?php

namespace App\Http\Requests\v1\Review;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'translations.*.comment' => 'required|string',
            'translations.*.profession' => 'required|string',
            'fullname' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:10240'
        ];
    }
}
