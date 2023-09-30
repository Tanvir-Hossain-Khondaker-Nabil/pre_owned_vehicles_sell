@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($expense))
@slot('title') Expense Edit @endslot
@else
@slot('title') Expense Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Expense Form</h4>
        <form method="POST" action="{{(@$expense) ? route('expenses.update',$expense->id) : route('expenses.store')}}" enctype="multipart/form-data">
            @csrf

            @if(isset($expense))
            @method('put')
            @endif
            <div class="row">

                <div class="col-xl-6">
                    <x-input type="date" label='Date' :required=true name="date" value="{{@$expense->date ?? old('date')}}">
                    </x-input>
                </div>
                <div class="col-xl-6 mt-2">
                    <div class="form-group">
                        <label class="form-label-lg fs-5 mx-3" for="status">Account Name <code>*</code></label>
                        <select class="form-control" name="account_id" id="account_id">
                            @if(isset($expense))
                            <option value="{{$expense->account_id}}">{{$expense->account->account_name}}</option>
                            @else
                            <option value=" ">Select</option>
                            @endif
                            @foreach($accounts as $key=>$account)
                            <option value="{{$key}}">{{$account}}</option>
                            @endforeach                         
                        </select>
                    @error('account_id')
                    <code>*{{$message}}</code>
                    @enderror
                    </div>
                </div>
                <div class="col-xl-6 mt-2">
                    <div class="form-group">
                        <label class="form-label-lg fs-5 mx-3" for="status">Expense Catagory Name<code>*</code></label>
                        <select class="form-control" name="expense_category_id" id="expense_category_id">
                            @if(isset($expense))
                            <option value="{{$expense->expense_category_id}}">{{$expense->expense_category->name}}</option>
                            @else
                            <option value=" ">Select</option>
                            @endif
                            @foreach($expense_catagories as $key=>$expense_catagory)
                            <option value="{{$key}}">{{$expense_catagory}}</option>
                            @endforeach                         
                        </select>
                    @error('expense_category_id')
                    <code>*{{$message}}</code>
                    @enderror
                    </div>
                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="status">Warehouse <code>*</code></label>
                    <select class="form-control" name="warehouse">
                        @if(isset($expense))
                        <option value="{{$expense->warehouse}}">
                            {{$expense->warehouse == 1 ? 'CTG Warehouse' : 'Gulshan Warehouse'}}
                        </option>
                        @else
                        <option value=" ">Select</option>
                        @endif
                        <option value="1">CTG Warehouse</option>
                        <option value="0">Gulshan Warehouse</option>
                    </select>
                    @error('warehouse')
                    <code>*{{$message}}</code>
                    @enderror
                </div>
                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="note">Notes</label>
                    <textarea class="form-control form-control-lg ps-3" required name="note" id="note" cols="30" rows="2"
                        placeholder="Enter Your Note">{{ old('note', @$expense->note)  }}</textarea>
                    @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> {{(@$expense)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
