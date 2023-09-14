@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($customer))
@slot('title') Customer Edit @endslot
@else
@slot('title') Customer Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Customer Form</h4>        
        <form method="POST" action="{{(@$customer) ? route('customers.update',$customer->id) : route('customers.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($customer))
            @method('put')
            @endif
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Name' :required=true placeholder="Enter Your Name" name="name" value="{{@$customer->name ?? old('name')}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <label class="form-label-lg fs-5 mx-3" for="avatar">Upload Image</label>
                    <input type="file"
                        class="form-control rounded-pill form-control-lg ps-3" value="{{ old('avatar')}}" name="avatar" />
                    @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Email' :required=true type="email" placeholder="Enter Your Email"
                        name="email" value="{{@$customer->email ?? old('email')}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='NID' :required=true type="number" placeholder="Enter Your NID"
                        name="nid" value="{{@$customer->nid ?? old('nid')}}">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Phone' :required=true type="tel" placeholder="Enter Your Phone"
                        name="phone" value="{{@$customer->phone ?? old('phone')}}">
                    </x-input>
                </div>                
                
                <div class="col-xl-6">
                    <x-input label='Driving License No' :required=true type="number"
                        placeholder="Enter Your Driving License No" name="driving_license_no" value="{{@$customer->driving_license_no ?? old('driving_license_no')}}">
                    </x-input>
                </div>
                <div class="mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="avater">Address</label>
                        <textarea class="form-control rounded-pill form-control-lg ps-3" required name="address" id="" cols="30" rows="2" placeholder="Enter Your Address" value="{{old('address')}}">{{ @$customer->address  }}</textarea>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$customer)?'Update':'Submit'}}</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
