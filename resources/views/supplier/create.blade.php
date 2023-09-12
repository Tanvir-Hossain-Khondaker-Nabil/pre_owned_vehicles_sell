@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Supplier Create @endslot
@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Form Grid Layout</h4>
        <form>
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Supplier Name' :required=true placeholder="Supplier Name" name="name">
                    </x-input>
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <x-input label='Supplier Email' :required=true type="email" placeholder="Supplier email"
                        name="email">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier Phome One' :required=true type="tel" placeholder="Supplier Phome One"
                        name="phone_1">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier Phome Two' :required=true type="tel" placeholder="Supplier Phome Two"
                        name="phone_2">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier Phome Two' :required=true type="tel" placeholder="Supplier Phome Two"
                        name="phone_2">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier Phome Two' type="tel" placeholder="Supplier Phome Two" name="phone_2">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier NID' :required=true type="number" placeholder="Supplier NID"
                        name="phone_2">
                    </x-input>
                </div>
                <div class="col-xl-6">
                    <x-input label='Supplier Driving License No' :required=true type="number"
                        placeholder="Supplier Driving License No" name="driving_license_no">
                    </x-input>
                </div>
                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
