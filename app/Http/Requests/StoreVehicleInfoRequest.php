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
            'registration_status' => ['required'],
            'paper_status'        => ['required'],
            'bank_payment'        => ['required'],
            'key'                 => ['required'],
            'service_book'        => ['required'],
            'buying_price'        => ['required'],
            'selling_price'       => ['required'],
            'first_purchase_date' => ['required'],
            'gate_pass_year'      => ['required'],
            'model_year'          => ['required'],
            'chassis_no'          => ['required'],
            'engine_no'           => ['required'],
            'vehicle_photo'       => ['nullable'],
            'vehicle_doc'         => ['nullable'],
            'details'             => ['nullable'],
            'vehicle_model_id'    => ['required'],
            'color_id'            => ['required'],
            'supplier_id'         => ['nullable', new CustomerOrSupplier],
            'customer_id'         => ['nullable', new CustomerOrSupplier],
        ];
    }
}
