@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($washcolor))
@slot('title') Wash Color Edit @endslot
@else
@slot('title') Wash Color Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Wash Color Form</h4>
        <form method="POST" action="{{(@$washcolor) ? route('washcolors.update',$washcolor->id) : route('washcolors.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($washcolor))
            @method('put')
            @endif
            <div class="row">
                <div class="col-xl-6">
                    <x-input label='Wash Color Name' :required=true placeholder="Enter Color Name" name="work" value="{{@$washcolor->work ?? old('work')}}">
                    </x-input>
                </div>

                <div class="col-xl-6">
                    <x-input label='Amount' :required=true type="number" placeholder="Enter Your Amount"
                        name="amount" value="{{@$washcolor->amount ?? old('amount')}}">
                    </x-input>
                </div>


                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$washcolor)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
