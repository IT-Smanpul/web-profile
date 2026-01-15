<?php

namespace App\Http\Requests\Employee;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'nip' => ['nullable', 'string', 'max:100', Rule::unique('employees', 'nip')],
            'role' => ['required', 'string', Rule::in(['guru', 'staff'])],
            'position' => ['required', 'string', 'max:100'],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }
}
