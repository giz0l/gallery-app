<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetImagesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'required|integer|min:1|max:30',
        ];
    }
}
