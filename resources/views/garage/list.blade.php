@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Supplier List @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Supplier Table</h4>
                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Color</th>
                                <th>Current Status</th>
                                <th>Total Amount</th>
                                <th>Model Name</th>
                                <th>Payment View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehiclesInfos as $vehiclesInfo)
                            <tr data-id="{{++$loop->index}}">
                                <td>{{++$loop->index}}</td>
                                <td class="text-body fw-bold">{{$vehiclesInfo->chassis_no}}</td>
                                <td class="text-body fw-bold">{{$vehiclesInfo->engine_no}}</td>
                                <td>{{$vehiclesInfo->color}}</td>
                                <td>
                                    <span class="badge badge-pill badge-soft-success font-size-12">
                                        {{$vehiclesInfo->current_status}}
                                    </span>
                                </td>
                                <td>{{$vehiclesInfo->fees->sum('amount') ?? "not Set"}}</td>
                                <td>{{$vehiclesInfo->vehicleModel->name}}</td>
                                <td>
                                    <a href="{{route('vehicle.garage.payment.view',$vehiclesInfo->id)}}"
                                        class="btn btn-dark waves-effect btn-label waves-light">
                                        Payment View <i class="bx bx-dollar label-icon "></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
