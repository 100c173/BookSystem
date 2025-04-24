<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author_id' => ['required', 'exists:authors,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'publication_year' => ['required', 'digits:4', 'integer', 'min:1000', 'max:' . date('Y')],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'], // 2MB Max
            'available_copies' => ['required', 'integer', 'min:0'],
            'path_file' => ['nullable', 'file', 'mimes:pdf,docx,epub', 'max:5120'], // 5MB Max
            'categories' => ['required','nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ];
    }
}
