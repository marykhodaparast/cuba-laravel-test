<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductionRequest extends FormRequest
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
            'job_number' => ['required', 'string', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'],
            'project_name' => ['required', 'string', 'max:255'],
            'customer' => ['required', 'string', 'max:255'],
            'no_of_structures' => ['required', 'integer', 'min:1'],
            'no_of_workers' => ['required', 'integer', 'min:1'],
            'feeders' => ['required', 'integer', 'min:0'],
            'main' => ['required', 'integer', 'min:0'],
            'tie' => ['required', 'integer', 'min:0'],
            'request_date' => ['required', 'date'],
            'start_date' => ['required', 'date', 'after_or_equal:request_date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'etd' => ['required', 'date', 'after_or_equal:end_date'],
            'atd' => ['nullable', 'date', 'after_or_equal:etd']
        ];
    }
}
