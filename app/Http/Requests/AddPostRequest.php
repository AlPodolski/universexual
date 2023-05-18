<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'fake' => Post::POST_REAL,
            'site_id' => SITE_ID,
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
