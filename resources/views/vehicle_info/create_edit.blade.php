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
@slot('title') @method( @$supplier ? 'Supplier Edit' : 'Supplier Create') @endslot

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
            action="{{ @$supplier ? route('vehicle-info.update',$supplier->id) : route('vehicle-info.store')}}"
            enctype="multipart/form-data">
            @csrf
            @method(@$supplier ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Enter Your Chassis No' :required=true placeholder="Enter Your Chassis No"
                        name="chassis_no" value="{{ old('chassis_no', @$supplier->chassis_no)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Enter Your Engine No' :required=true placeholder="Enter Your Engine No"
                        name="engine_no" value="{{ old('engine_no', @$supplier->engine_no)}}">
                    </x-input>
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Enter Your Vehicle Color' :required=true placeholder="Enter Your Vehicle Color"
                        name="color" value="{{ old('color', @$supplier->color)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    {{-- <div class="mb-3">
                        <label class="form-label form-label-lg fs-5 mx-3">Single Select</label>
                        <select class="form-control rounded-pill form-control-lg ps-3 select2" name="">
                            <option>Select</option>
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                        </select>
                        @error('')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                </div>
                <div class="col-xl-6">
                    <div class="mb-3 @error('supplier_id') is-invalid @enderror">
                        <label class="form-label form-label-lg fs-5 mx-3">Select Supplier</label>
                        <select class="form-control rounded-pill form-control-lg ps-3 select2" name="supplier_id">
                            <option>Select</option>
                            @forelse ($suppliers as $supplier)
                            <option value="{{$supplier->id}}" {{(old('supplier_id')==$supplier->id)? 'selected' :
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
                            <option>Select--</option>
                            @forelse ($customers as $customer)
                            <option value="{{$customer->id}}" {{(old('customer_id')==$customer->id)? 'selected' :
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
                        placeholder="Enter Your Vehicle Details">{{ old('details', @$supplier->details)  }}</textarea>
                    @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$supplier)?'Update':'Save'}}</button>
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
