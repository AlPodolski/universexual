<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'posts_id' => 'required|exists:posts,id',
            'is_happy' => 'required|numeric|min:0|max:1',
            'rating' => 'required|numeric|min:0|max:10',
            'clean' => 'required|numeric|min:0|max:10',
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:600',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
