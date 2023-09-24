@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('css')
<!-- Lightbox css -->
<link href="{{ asset('backend/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Vehicle Doc View @endslot

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Vehicle Chassis No: <span
                class="badge badge-pill badge-soft-success font-size-12">{{$vehiclesInfo->chassis_no}}</span></h4>

        <div class="row">
            <div class="row mb-4">
                <label class="col-sm-1 h5">#</label>
                <label class="col-sm-3 h5">Document Name</label>
                <label class="col-sm-5 h5">Document</label>
                <label class="col-sm-3 h5">Note</label>
            </div>
            @forelse ($vehiclesInfo->documents as $document)
            <div class="row mb-4">
                <label class="col-sm-1 h5">{{++$loop->index}}</label>
                <label class="col-sm-3 h5">{{$document->name}}</label>
                <div class="col-sm-5">
                    <a class="image-popup-no-margins" href="{{asset($document->pivot->path)}}"
                        title="{{$document->name}}">
                        <img class="img-fluid" alt="{{$document->name}}" width="200"
                            src="{{asset($document->pivot->path)}}">
                    </a>
                </div>
                <div class="col-sm-3">
                    <label class="col-sm-3 h5">{{$document->pivot->details}}</label>
                </div>
            </div>
            @empty
            <div class="row mb-4 text-center">
                <label class="col-sm-12 col-form-label">No Document Created</label>
            </div>
            @endforelse
            <div class="col-xl-12 m-4">
                <div>
                    <a href="{{route('vehicle-info.index')}}" class="btn btn-primary w-md"> Go Vehicle List</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection

@section('script')
<!-- Magnific Popup-->
<script src="{{ asset('backend/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>

<!-- lightbox init js-->
<script src="{{ asset('backend/assets/js/pages/lightbox.init.js') }}"></script>
@endsection
