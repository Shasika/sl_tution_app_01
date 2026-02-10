<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'institute_id' => ['required', 'integer'],
            'institute_code' => ['required', 'string'],
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'grade_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ];
    }
}
