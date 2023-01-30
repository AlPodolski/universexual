<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'posts_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'rating' => 'integer|max:5',
            'text' => 'required|string|max:600',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
