<?php

namespace App\Http\Requests\Setting;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKepalaSekolahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'nip' => ['required', 'string', 'max:50'],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }
}
