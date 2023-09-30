@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($expenseCategory))
@slot('title') Expense Category Edit @endslot
@else
@slot('title') Expense Category Create @endslot
@endif

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Expense Category Form</h4>
        <form method="POST" action="{{(@$expenseCategory) ? route('expense-categories.update',$expenseCategory->id) : route('expense-categories.store')}}">
            @csrf

            @if(isset($expenseCategory))
            @method('put')
            @endif
            <div class="row">

                <div class="col-xl-6">
                    <x-input label='Name' :required=true placeholder="Enter Name" name="name" value="{{@$expenseCategory->name ?? old('name')}}">
                    </x-input>
                </div>

                

                <div class="col-xl-6 mt-2">
                    <label class="form-label-lg fs-5 mx-3" for="status">Expense Category Status <code>*</code></label>
                    <select class="form-control" name="status">
                        @if(isset($expenseCategory))
                        <option value="{{$expenseCategory->status}}">
                            {{$expenseCategory->status == 1 ? 'Active' : 'Inactive'}}
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
                        <button type="submit" class="btn btn-primary w-md"> {{(@$expenseCategory)?'Update':'Submit'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
