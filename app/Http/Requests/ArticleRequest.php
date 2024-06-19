<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            /*'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required'],
            'full_text' => ['required'],
            'image' => ['nullable', 'image', 'max:2048'],
            'tag_id' => ['required', 'array'],
            'tag_id.*' => ['exists:tags,id'],*/
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
