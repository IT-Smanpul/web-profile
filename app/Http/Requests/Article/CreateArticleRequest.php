<?php

namespace App\Http\Requests\Article;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', File::image()->max('2mb')],
        ];
    }
}
