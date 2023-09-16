<?php

namespace App\Http\Requests;

use App\Rules\CustomerOrSupplier;
use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleInfoRequest extends FormRequest
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
            'chassis_no'       => ['required'],
            'engine_no'        => ['required'],
            'color'            => ['required'],
            'vehicle_model_id' => ['required'],
            'current_status'   => ['nullable'],
            'details'          => ['nullable'],
            'supplier_id'      => ['nullable', new CustomerOrSupplier],
            'customer_id'      => ['nullable', new CustomerOrSupplier],
        ];
    }
}
