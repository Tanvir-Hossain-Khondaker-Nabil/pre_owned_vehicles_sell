@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('css')
<link href="{{ asset('backend/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('backend/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('backend/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('backend/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="{{ asset('backend/assets/libs/datepicker/datepicker.min.css') }}">
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') @method( @$vehicle_info ? 'Supplier Edit' : 'Supplier Create') @endslot

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Supplier Form</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('vehicle-info.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label form-label-lg fs-5 mx-3">Registration Status</label>
                    <select class="form-control form-control-lg ps-3" name="registration_status">
                        <option value="Register">Register</option>
                        <option value="Ontest">Ontest</option>
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label form-label-lg fs-5 mx-3">Paper Status</label>
                    <select class="form-control form-control-lg ps-3" name="paper_status">
                        <option value="Due">Due</option>
                        <option value="Provided">Provided</option>
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label form-label-lg fs-5 mx-3">Bank Payment</label>
                    <select class="form-control form-control-lg ps-3" name="bank_payment">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label form-label-lg fs-5 mx-3">Key</label>
                    <select class="form-control form-control-lg ps-3" name="key">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label form-label-lg fs-5 mx-3">Service Book</label>
                    <select class="form-control form-control-lg ps-3" name="service_book">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-xl-6 mb-3">
                    <x-input label='Buying Price' :required=true placeholder="Buying Price" name="buying_price"
                        value="{{ old('buying_price')}}">
                    </x-input>
                </div>
                <div class="col-xl-6 mb-3">
                    <x-input label='Selling Price' :required=true placeholder="Selling Price" name="selling_price"
                        value="{{ old('selling_price')}}">
                    </x-input>
                </div>
                <div class="col-xl-6 mb-3">
                    <x-input label='Date Of First Purchase' type='month' :required=true
                        placeholder="Date Of First Purchase" name="first_purchase_date"
                        value="{{ old('first_purchase_date')}}">
                    </x-input>
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label-lg fs-5 mx-3" for="formValidation">Gate Pass Year</label>
                    <input type="text" id="datepicker1" data-date-format="yyyy" data-date-autoclose="true"
                        data-provide="datepicker" data-date-container='#datepicker1' name="gate_pass_year"
                        class="form-control  form-control-lg ps-3 @error('gate_pass_year') is-invalid @enderror"
                        required placeholder="Gate Pass Year" />
                    @error('gate_pass_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label-lg fs-5 mx-3" for="formValidation">Model Year</label>
                    <input type="text" id="datepicker2" data-date-format="yyyy" data-date-autoclose="true"
                        data-provide="datepicker" data-date-container='#datepicker2' name="model_year"
                        class="form-control  form-control-lg ps-3 @error('model_year') is-invalid @enderror" required
                        placeholder="Model Year" />
                    @error('model_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <x-input label='Chassis No' :required=true placeholder="Chassis No" name="chassis_no"
                        value="{{ old('chassis_no', @$vehicle_info->chassis_no)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Engine No' :required=true placeholder="Engine No" name="engine_no"
                        value="{{ old('engine_no', @$vehicle_info->engine_no)}}">
                    </x-input>
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Vehicle Color' :required=true placeholder="Vehicle Color" name="color"
                        value="{{ old('color', @$vehicle_info->color)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('vehicle_model_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Vehicle Model</label>
                        <select class="form-control  form-control-lg ps-3 select2" name="vehicle_model_id">
                            <option value="">Select--</option>
                            @foreach ($vehicles as $vehicle)
                            <optgroup label="{{$vehicle->company_name}}">
                                @foreach ($vehicle->vehicleModels as $vehicleModel)
                                <option value="{{$vehicleModel->id}}">{{$vehicleModel->name}}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    @error('vehicle_model_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('supplier_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Select Supplier</label>
                        <div class="input-group">
                            <select class="form-control form-control-lg" name="supplier_id">
                                <option value="">Select--</option>
                                @forelse ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{ $supplier->name}}</option>
                                @empty
                                <option value="">No Supplier Found</option>
                                @endforelse
                            </select>
                            <strong class="input-group-text btn btn-success"><i class="bx bx-plus-medical"
                                    style="line-height: 2"></i></strong>
                        </div>
                    </div>
                    @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('customer_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Select Customer</label>
                        <div class="input-group">
                            <select class="form-control form-control-lg" name="customer_id">
                                <option value="">Select--</option>
                                @forelse ($customers as $customer)
                                <option value="{{$customer->id}}">{{ $customer->name}}</option>
                                @empty
                                <option value="">No Custoner Found</option>
                                @endforelse
                            </select>
                            <strong class="input-group-text btn btn-success"><i class="bx bx-plus-medical"
                                    style="line-height: 2"></i></strong>
                        </div>
                    </div>
                    @error('customer_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('customer_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Color</label>
                        <div class="input-group">
                            <select class="form-control form-control-lg" name="color_id">
                                <option value="">Select--</option>
                                @forelse ($customers as $customer)
                                <option value="{{$customer->id}}">{{ $customer->name}}</option>
                                @empty
                                <option value="">No Custoner Found</option>
                                @endforelse
                            </select>
                            <strong class="input-group-text btn btn-success"><i class="bx bx-plus-medical"
                                    style="line-height: 2"></i></strong>
                        </div>
                    </div>
                    @error('customer_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <x-input label='Vehicle Photo' type='file' :required=true name="vehicle_photo">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Vehicle Doc' type='file' :required=true name="vehicle_doc">
                    </x-input>
                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3">Vehicle Details</label>
                    <textarea class="form-control form-control-lg ps-3" name="details" rows="1"
                        placeholder="Vehicle Details"></textarea>
                    @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
@section('script')
<script src="{{ asset('backend/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datepicker/datepicker.min.js') }}"></script>

<!-- form advanced init -->
<script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>

<script>
    $('#datepicker1').datepicker({
    autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    })

    $("#datepicker1").keydown(function(event) {
    return false;
    });
    $('#datepicker2').datepicker({
    autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    })

    $("#datepicker2").keydown(function(event) {
    return false;
    });
</script>
@endsection
