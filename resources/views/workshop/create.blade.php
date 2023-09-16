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
        <form method="POST" action="{{(@$workshop) ? route('workshops.update',$workshop->id) : route('workshops.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($workshop))
            @method('put')
            @endif
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Work Shop Name' :required=true placeholder="Enter Shop Name" name="work" value="{{@$workshop->work ?? old('work')}}">
                    </x-input>
                </div>

                <div class="col-xl-6">
                    <x-input label='Amount' :required=true type="number" placeholder="Enter Your Amount"
                        name="amount" value="{{@$workshop->amount ?? old('amount')}}">
                    </x-input>
                </div>


                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$workshop)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
