<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'school_name' => ['required', 'string', 'max:255'],
            'npsn' => ['required', 'string', 'max:30'],
            'school_status' => ['required', 'string', 'max:50'],
            'accreditation' => ['required', 'string', 'max:20'],
            'curriculum' => ['required', 'string', 'max:100'],
        ];
    }
}
