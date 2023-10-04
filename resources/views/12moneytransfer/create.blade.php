@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($workshop))
@slot('title') Work Shop Edit @endslot
@else
@slot('title') Work Shop Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Work Shop Form</h4>
        <form method="POST" action="{{ route('moneytr.store') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-6">

                    <x-input label='Date' :required=true placeholder="Enter Date" type="date" name="date">
                    </x-input>

                    <x-input label='Reference No' :required=true placeholder="Enter Reference No" name="reference_no">
                    </x-input>

                    <x-input label='From Account' :required=true placeholder="Enter From Account" name="from_account">
                    </x-input>

                    <x-input label='To Account' :required=true placeholder="Enter To Account" name="to_account">
                    </x-input>

                    <x-input label='Accounts Ballance' :required=true placeholder="Enter Accounts Ballance" name="accounts_bl">
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
