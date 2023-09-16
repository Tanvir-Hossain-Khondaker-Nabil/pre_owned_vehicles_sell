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
        <form method="POST"
            action="{{ @$vehicle_info ? route('vehicle-info.update',$vehicle_info->id) : route('vehicle-info.store')}}"
            enctype="multipart/form-data">
            @csrf
            @method(@$vehicle_info ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Enter Your Chassis No' :required=true placeholder="Enter Your Chassis No"
                        name="chassis_no" value="{{ old('chassis_no', @$vehicle_info->chassis_no)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Enter Your Engine No' :required=true placeholder="Enter Your Engine No"
                        name="engine_no" value="{{ old('engine_no', @$vehicle_info->engine_no)}}">
                    </x-input>
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Enter Your Vehicle Color' :required=true placeholder="Enter Your Vehicle Color"
                        name="color" value="{{ old('color', @$vehicle_info->color)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('vehicle_model_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Single Vehicle Model</label>
                        <select class="form-control rounded-pill form-control-lg ps-3 select2" name="vehicle_model_id">
                            <option value="">Select--</option>
                            @foreach ($vehicles as $vehicle)
                            <optgroup label="{{$vehicle->company_name}}">
                                @foreach ($vehicle->vehicleModels as $vehicleModel)
                                <option value="{{$vehicleModel->id}}" {{(old('vehicle_model_id',@$vehicle_info->
                                    vehicle_model_id) ==
                                    $vehicleModel->id) ?
                                    'selected' : ''}}>{{$vehicleModel->name}}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    @error('vehicle_model_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if (@$vehicle_info->ownable_type == 'App\Models\Supplier')
                @php
                $supplierId = $vehicle_info->ownable->id
                @endphp
                @elseif (@$vehicle_info->ownable_type == 'App\Models\Customer')
                @php
                $customerId = $vehicle_info->ownable->id
                @endphp
                @endif
                <div class="col-xl-6">
                    <div class="mb-3 @error('supplier_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Select Supplier</label>
                        <select class="form-control rounded-pill form-control-lg ps-3 select2" name="supplier_id">
                            <option value="">Select--</option>
                            @forelse ($suppliers as $supplier)
                            <option value="{{$supplier->id}}" {{(old('supplier_id',($supplierId??null))==$supplier->id)?
                                'selected' :
                                ''}}>{{ $supplier->name}}</option>
                            @empty
                            <option>No Supplier Found</option>
                            @endforelse
                        </select>
                    </div>
                    @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('customer_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Select Customer</label>
                        <select class="form-control rounded-pill form-control-lg ps-3 select2" name="customer_id">
                            <option value="">Select--</option>
                            @forelse ($customers as $customer)
                            <option value="{{$customer->id}}" {{(old('customer_id',($customerId??null))==$customer->id)?
                                'selected' :
                                ''}} >{{ $customer->name}}</option>
                            @empty
                            <option>No Custoner Found</option>
                            @endforelse
                        </select>
                    </div>
                    @error('customer_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3">Vehicle Details</label>
                    <textarea class="form-control form-control-lg ps-3" name="details" rows="4"
                        placeholder="Enter Your Vehicle Details">{{ old('details', @$vehicle_info->details)  }}</textarea>
                    @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">
                            {{(@$vehicle_info)?'Update':'Save'}}</button>
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
@endsection
