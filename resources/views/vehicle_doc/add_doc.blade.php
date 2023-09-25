@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Workshop Payment @endslot

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Vehicle Chassis No: <span
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
        <form method="POST" action="{{ route('vehicle.document.store',$vehiclesInfo->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="row mb-4">
                    <label class="col-sm-1 h5">#</label>
                    <label class="col-sm-4 h5">Document Name</label>
                    <label class="col-sm-2 h5">Document</label>
                    <label class="col-sm-3 h5">Note</label>
                    <label class="col-sm-2 h5">Check</label>
                </div>
                @forelse ($documents as $document)
                <div class="row mb-4">
                    <label class="col-sm-1 h5">{{++$loop->index}}</label>
                    <label class="col-sm-3 h5">{{$document->name}}</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control form-control-lg ps-3" name="doc_[{{$document->id}}]">
                        @error('doc_[{{$document->id}}]')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <textarea class="form-control form-control-lg ps-3" name="details[{{$document->id}}]" rows="1"
                            placeholder="Enter Your Note"></textarea>
                        @error('details')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-checkbox-outline form-check-success mb-3">
                            <input class="form-check-input" id="workshop_id{{$document->id}}" type="checkbox"
                                name="document_id[{{$document->id}}]" value="{{$document->id}}">
                            <label class="form-check-label" for="workshop_id{{$document->id}}">
                                Check For pay
                            </label>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row mb-4 text-center">
                    <label class="col-sm-12 col-form-label">No Document Created</label>
                </div>
                @endforelse
                <div class="col-xl-12 m-4">
                    <div>
                        <button type="submit" class="btn btn-primary w-md"> Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
