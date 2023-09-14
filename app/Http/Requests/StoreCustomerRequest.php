<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'phone' => ['required', 'numeric'],
            'nid' => ['required', 'numeric'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'driving_license_no' => ['required', 'numeric'],
            'avatar' => ['required', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
        ];
    }
}