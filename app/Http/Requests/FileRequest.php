<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|file|max:1024|mimes:pdf,docx,doc',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
