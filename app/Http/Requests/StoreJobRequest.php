<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'string', 'regex:/^\$?\d{1,3}(,\d{3})*(\.\d{2})?$|^\$?\d+(\.\d{2})?$/'],
            'location' => ['required', 'string', 'min:2', 'max:255'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'tags' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter a job title.',
            'title.min' => 'Job title must be at least 3 characters.',
            'title.max' => 'Job title must not exceed 255 characters.',

            'salary.required' => 'Please enter a salary.',
            'salary.regex' => 'Please enter a valid salary format (e.g., 50,000 or 50000).',

            'location.required' => 'Please enter a job location.',
            'location.min' => 'Location must be at least 2 characters.',
            'location.max' => 'Location must not exceed 255 characters.',

            'schedule.required' => 'Please select a schedule type.',
            'schedule.in' => 'Please select either Part Time or Full Time.',

            'tags.max' => 'Tags input is too long (maximum 500 characters).',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => trim($this->input('title', '')),
            'salary' => $this->cleanSalary($this->input('salary', '')),
            'location' => trim($this->input('location', '')),
            'tags' => trim($this->input('tags', '')),
        ]);
    }

    private function cleanSalary(string $salary): string
    {
        $cleaned = preg_replace('/[^\d.]/', '', $salary);

        if (empty($cleaned)) {
            return $salary;
        }

        return number_format((float) $cleaned, 2, '.', '');
    }
}