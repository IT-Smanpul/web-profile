<?php

namespace App\Http\Requests\Setting\Waka;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWakaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100', Rule::unique('school_structures', 'name')->ignore($this->route('waka'))],
            'nip' => ['required', 'string', 'max:50'],
            'position' => ['required', 'string', 'max:100'],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }
}
