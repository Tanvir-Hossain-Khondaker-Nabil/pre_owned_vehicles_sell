@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($account))
@slot('title') Account Edit @endslot
@else
@slot('title') Account Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Account Form</h4>
        <form method="POST" action="{{(@$account) ? route('accounts.update',$account->id) : route('accounts.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($account))
            @method('put')
            @endif
            <div class="row">

                <div class="col-xl-6">
                    <x-input label='Account No' :required=true placeholder="Enter Account No" name="account_no" value="{{@$account->account_no ?? old('account_no')}}">
                    </x-input>
                </div>

                <div class="col-xl-6">
                    <x-input label='Account Name' :required=true placeholder="Enter Account Name" name="account_name" value="{{@$account->account_name ?? old('account_name')}}">
                    </x-input>
                </div>

                <div class="col-xl-6">
                    <x-input label='Initial Balance' :required=true placeholder="Enter Initial Balance" name="initial_balance" value="{{@$account->initial_balance ?? old('initial_balance')}}">
                    </x-input>
                </div>

                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="note">Notes</label>
                    <textarea class="form-control form-control-lg ps-3" required name="note" id="note" cols="30" rows="2"
                        placeholder="Enter Your Note">{{ old('note', @$account->note)  }}</textarea>
                    @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="status">Account Status <code>*</code></label>
                    <select class="form-control" name="status">
                        @if(isset($account))
                        <option value="{{$account->status}}">
                            {{$account->status == 1 ? 'Active' : 'Inactive'}}
                        </option>
                        @else
                        <option value=" ">Select</option>
                        @endif
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                    <code>*{{$message}}</code>
                    @enderror
                </div>

                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$account)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
