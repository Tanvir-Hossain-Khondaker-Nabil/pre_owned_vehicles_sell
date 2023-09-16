@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Tranport Payment @endslot

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Vehicle Chassis No <span
                class="badge badge-pill badge-soft-success font-size-12">{{$vehiclesInfo->chassis_no}}</span></h4>
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
            action="{{ @$transport ? route('vehicle.transport.update',$vehiclesInfo->id) : route('vehicle.transport.store',$vehiclesInfo->id)}}"
            enctype="multipart/form-data">
            @csrf
            @method(@$transport ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Enter Transport Amount' :required=true placeholder="Enter Transport Amount"
                        name="amount" value="{{ old('amount', @$transport->amount)}}">
                    </x-input>
                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3">Vehicle Details</label>
                    <textarea class="form-control form-control-lg ps-3" name="details" rows="4"
                        placeholder="Enter Your Vehicle Details">{{ old('details', @$transport->details)  }}</textarea>
                    @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$transport)?'Update':'Save'}}</button>
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
