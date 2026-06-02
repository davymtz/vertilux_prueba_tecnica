<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderIndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'string',
            'status' => 'string',
            'sort_by' => 'string',
            'sort_direction' => 'nullable|string',
            'page' => 'integer|min:1',
            'limit' => 'integer|min:1',
        ];
    }
}
