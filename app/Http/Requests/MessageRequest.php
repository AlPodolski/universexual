<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'posts_id' => 'required|exists:posts,id',
            'email' => 'required|email',
            'text' => 'required|string|max:600',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
