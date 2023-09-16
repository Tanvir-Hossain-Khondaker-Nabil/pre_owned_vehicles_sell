@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($supplier))
@slot('title') Supplier Edit @endslot
@else
@slot('title') Supplier Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Supplier Form</h4>
        <form method="POST"
            action="{{ @$supplier ? route('suppliers.update',$supplier->id) : route('suppliers.store')}}"
            enctype="multipart/form-data">
            @csrf
            @if(@$supplier)
            @method('put')
            @endif
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Name' :required=true placeholder="Enter Your Name" name="name"
                        value="{{ old('name', @$supplier->name)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Upload Image' type="file" :required=true placeholder="Upload Image" name="avatar">
                    </x-input>
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Email' :required=true type="email" placeholder="Enter Your Email" name="email"
                        value="{{ old('email', @$supplier->email)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='NID' :required=true type="number" placeholder="Enter Your NID" name="nid"
                        value="{{ old('nid', @$supplier->nid)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Phone One' :required=true type="tel" placeholder="Enter Your Phone One"
                        name="phone_1" value="{{ old('phone_1', @$supplier->phone_1)}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Phone Two' :required=true type="tel" placeholder="Enter Your Phone Two"
                        name="phone_2" value="{{ old('phone_2', @$supplier->phone_2)}}">
                    </x-input>
                </div>

                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="avater">Address</label>
                    <textarea class="form-control form-control-lg ps-3" required name="address" id="" cols="30" rows="2"
                        placeholder="Enter Your Address">{{ old('address', @$supplier->address)  }}</textarea>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <x-input label='Driving License No' :required=true type="number"
                        placeholder="Enter Your Driving License No" name="driving_license_no"
                        value="{{old('driving_license_no',@$supplier->driving_license_no)}}">
                    </x-input>
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
