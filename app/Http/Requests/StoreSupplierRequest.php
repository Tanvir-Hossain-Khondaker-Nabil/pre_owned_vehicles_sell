<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'driving_licence' => ['required', 'numeric'],
            'image' => ['required', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
        ];
    }
}
