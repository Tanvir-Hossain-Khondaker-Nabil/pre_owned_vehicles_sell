<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'phone_1' => ['required', 'numeric'],
            'nid' => ['required', 'numeric'],
            'address' => ['required', 'max:255'],
            'phone_2' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'driving_license_no' => ['required', 'numeric'],
        ];
    }
}