<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:255',
            'user_id' => 'required|integer', // TODO: check if user is connected
            'channel_id' => 'required|integer',
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'channel_id' => 1,
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
