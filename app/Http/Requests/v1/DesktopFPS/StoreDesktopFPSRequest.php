<?php

namespace App\Http\Requests\v1\DesktopFPS;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesktopFPSRequest extends FormRequest
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
            'fps.game_id' => 'required|exists:games,id',
            'fps.resolution' => 'required|string',
            'fps.fps_value' => 'required|integer'
        ];
    }
}
