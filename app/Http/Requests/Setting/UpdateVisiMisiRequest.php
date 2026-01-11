<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisiMisiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vision' => ['required', 'string', 'max:1000'],
            'missions' => ['required', 'array', 'min:1'],
            'missions.*' => ['required', 'string', 'max:500'],
        ];
    }
}
