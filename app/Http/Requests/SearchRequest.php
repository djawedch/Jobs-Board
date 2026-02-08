<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => ['required', 'string', 'min:2', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'q.required' => 'Please enter a job title, keyword, or tag to search.',
            'q.min' => 'Search term must be at least 2 characters.',
            'q.max' => 'Search term is too long (maximum 100 characters).',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('q')) {
            $this->merge([
                'q' => trim($this->input('q'))
            ]);
        }
    }
}