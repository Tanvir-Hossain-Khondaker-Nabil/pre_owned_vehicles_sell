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
                                <th>WC. Amount</th>
                                <th>Model Name</th>
                                <th>Payment View</th>
                                <th>Wahs OR Color</th>
                                <th>Action</th>
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
                                <td>{{$vehiclesInfo->washColors->sum('pivot.amount') ?? "not Set"}}</td>
                                <td>{{$vehiclesInfo->vehicleModel->name}}</td>
                                <td>
                                    <a href="{{route('vehicle.wash.color.payment.view',$vehiclesInfo->id)}}"
                                        class="btn btn-dark waves-effect btn-label waves-light">
                                        Payment View <i class="bx bx-dollar label-icon "></i></a>
                                </td>
                                <td>
                                    <a href="{{route('vehicle.wash.color.garage',$vehiclesInfo->id)}}"
                                        class="btn btn-success waves-effect btn-label waves-light">
                                        Send Garage <i class="bx bx-right-arrow-alt label-icon "></i></a>
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="text-success"
                                            href="{{route('vehicle.wash.color.create',$vehiclesInfo->id)}}"
                                            title="Create">
                                            <i class="mdi mdi-plus font-size-18"></i>
                                        </a>
                                        <a class="text-success"
                                            href="{{route('vehicle.wash.color.edit',$vehiclesInfo->id)}}" title="Edit">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <form method="post" id="{{'form_'.$vehiclesInfo->id}}"
                                            action="{{route('vehicle.wash.color.destroy',$vehiclesInfo->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-danger"
                                                data-id="{{$vehiclesInfo->id}}"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                        </form>
                                    </div>
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
