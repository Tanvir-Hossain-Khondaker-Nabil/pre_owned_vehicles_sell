@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($vehiclemodel))
@slot('title') Vehicle Model Edit @endslot
@else
@slot('title') Vehicle Model Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Vehicle Model Form</h4>
        <form method="POST" action="{{(@$vehiclemodel) ? route('vehiclemodels.update',$vehiclemodel->id) : route('vehiclemodels.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($vehiclemodel))
            @method('put')
            @endif
            <div class="row">

                <div class="col-xl-6">
                    <label class="form-label m-2 font-size-15"><strong>Vehicle Name</strong></label>
                    <select class="form-select m-2 @error('vehicle_id') is-invalid @enderror" required name="vehicle_id"
                        id="vehicle_id">
                        <option>Select Vehicle Name</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}"
                                {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->company_name }}</option>
                        @endforeach
                    </select>
                    @error('vehicle_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-6">
                    <x-input label='Vehicle Model Name' :required=true placeholder="Enter Your Vehicle Model Name" name="name" value="{{@$vehiclemodel->name ?? old('vehiclemodel')}}">
                    </x-input>
                </div>


                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$vehiclemodel)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
