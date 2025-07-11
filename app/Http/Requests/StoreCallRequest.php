<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'posts_id' => 'required|integer|exists:posts,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'text' => 'nullable|string|max:1000',
        ];
    }
}
