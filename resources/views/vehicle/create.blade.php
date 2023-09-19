@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($vehicle))
@slot('title') Vehicle Edit @endslot
@else
@slot('title') Vehicle Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Vehicle Form</h4>
        <form method="POST" action="{{(@$vehicle) ? route('vehicles.update',$vehicle->id) : route('vehicles.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($vehicle))
            @method('put')
            @endif
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Vehicle Name' :required=true placeholder="Enter Vehicle Name" name="company_name" value="{{@$vehicle->company_name ?? old('company_name')}}">
                    </x-input>
                </div>

                <!-- end col -->
                {{-- <div class="col-xl-6">
                    <label class="form-label-lg fs-5 mx-3" for="company_logo">Upload Image</label>
                    <input type="file"
                        class="form-control rounded-pill form-control-lg ps-3" value="{{ old('company_logo')}}" name="company_logo" />
                    @error('company_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="col-xl-6">
                    <x-input label='Upload Image' type="file" :required=true placeholder="Upload Image" name="company_logo">
                    </x-input>
                </div>

                {{-- <div class="col-xl-6">
                    <label class="form-label-lg fs-5 mx-3" for="avatar">Upload Image</label>
                    <input type="file"
                        class="form-control rounded-pill form-control-lg ps-3" value="{{ old('avatar')}}" name="avatar" />
                    @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="col-xl-6">

                    <label class="form-label m-3 font-size-15"><strong>Car or Bikes</strong></label>
                    <div class="form-check m-1 font-size-15">
                        <input type="radio" class="form-check-input" name="type" id="car" value="car"
                            @if (@$vehicle['type'] == 'car') checked @endif {{ old('type') == 'car' ? 'checked' : '' }}>
                        <label class="form-check-label" for="car">Car</label>
                    </div>
                    <div class="form-check m-1 font-size-15">
                        <input type="radio" class="form-check-input" name="type" id="bike" value="bike"
                            @if (@$vehicle['type'] == 'bike') checked @endif {{ old('type') == 'bike' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bike">Bike</label>
                    </div>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$vehicle)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
