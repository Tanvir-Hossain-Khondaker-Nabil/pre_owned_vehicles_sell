@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') WorkShop payment @endslot

@endcomponent
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Vehicle Chassis No: <span
                class="badge badge-pill badge-soft-success font-size-12">{{$vehiclesInfo->chassis_no}}</span></h4>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Work Name</th>
                        <th>Work Price</th>
                        <th>Paid</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehiclesInfo->workshops as $workshop)
                    <tr class="{{$loop->even ? 'table-warning' : 'table-light'}}">
                        <th scope="row">{{++$loop->index}}</th>
                        <td>{{$workshop->work}}</td>
                        <td>{{$workshop->amount}}</td>
                        <td>{{$workshop->pivot->amount}}</td>
                        <td>{{$workshop->pivot->details}}</td>
                    </tr>
                    @empty
                    <tr class="table-danger">
                        <th scope="row" colspan="5" class="text-center">No Payment Created</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-xl-12 m-4">
            <div>
                <a href="{{ route('vehicle.workshop.index') }}" class="btn btn-primary w-md">Main List</a>
            </div>
        </div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
@endsection
