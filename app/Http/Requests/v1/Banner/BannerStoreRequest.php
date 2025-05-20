<?php

namespace App\Http\Requests\v1\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
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
            'translations.%name%' => 'required|sometimes|string',
            'translations.%description%' => 'required|sometimes|string',
            'image' => 'required|max:2048|mimes:png,jpg,jpeg',
            'url' => 'required|url'
        ];
    }
}
