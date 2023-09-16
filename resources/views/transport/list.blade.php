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
                                <th>Amount</th>
                                <th>Model Name</th>
                                <th>T. Details</th>
                                <th>WorkShop</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehiclesInfos as $vehiclesInfo)
                            @php
                            $transport = $vehiclesInfo->fees->where('workable_type','transport')->first()
                            @endphp
                            <tr data-id="{{++$loop->index}}">
                                <td>{{++$loop->index}}</td>
                                <td class="text-body fw-bold">{{$vehiclesInfo->chassis_no}}</td>
                                <td class="text-body fw-bold">{{$vehiclesInfo->engine_no}}</td>
                                <td>{{$vehiclesInfo->color}}</td>
                                <td>{{$vehiclesInfo->current_status}}</td>
                                <td>{{$transport->amount}}</td>
                                <td>{{$vehiclesInfo->vehicleModel->name}}</td>
                                <td>{{$transport->details}}</td>
                                <td>
                                    <a href="{{route('vehicle.transport.workshop',$vehiclesInfo->id)}}" class="btn btn-warning waves-effect btn-label waves-light"><i
                                            class="bx bx-error label-icon "></i>Send WorkShop</a>
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        @if ($transport)
                                        <a class="text-success"
                                            href="{{route('vehicle.transport.create',$vehiclesInfo->id)}}">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <form method="post" id="{{'form_'.$vehiclesInfo->id}}"
                                            action="{{route('vehicle.transport.destroy',$vehiclesInfo->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-danger"
                                                data-id="{{$vehiclesInfo->id}}"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                        </form>
                                        @else
                                        <a class="text-success"
                                            href="{{route('vehicle.transport.edit',$vehiclesInfo->id)}}" title="Edit">
                                            <i class="mdi mdi-plus font-size-18"></i>
                                        </a>
                                        @endif
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
