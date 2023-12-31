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
        <form method="POST" action="{{ route('vehicledoc.update', $documents->id)  }}" enctype="multipart/form-data">
          

            @csrf
            {{-- @method('PUT') --}}

            <div class="row">

                <div class="col-xl-6">

                    <x-input label='Name' :required=true placeholder="Enter Shop Name" name="name" value="{{$documents->name}}">
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
