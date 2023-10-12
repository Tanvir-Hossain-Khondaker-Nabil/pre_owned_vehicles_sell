@extends('layouts.master')

@section('title')
Pre Owned Vehicles Sell
@endsection

@section('css')
<!-- DataTables -->
<link type="text/css" href="{{ asset('backend/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Vehicle List @endslot
@endcomponent
<div class="row">
    @csrf
    <div class="row  justify-content-between">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form accept="{{ route('vehicle-info.index') }}" method="get" class="row row-cols-lg-auto g-3">
                <div class="col-12 ">
                    <select class="form-select" name="supplier_id" required>
                        <option value="" selected>Choose...</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-md" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{route('vehicle-info.create')}}" class="btn btn-success w-md" type="submit">Create</a>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Supplier Table</h4>
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive  nowrap w-100" id="datatable-buttons">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Registration Status</th>
                                <th>Paper Status</th>
                                <th>Bank Payment</th>
                                <th>Service Book</th>
                                <th>Key</th>
                                <th>Buying Price</th>
                                <th>Delivery Charge</th>
                                <th>Selling Price</th>
                                <th>First Purchase Date</th>
                                <th>Gate Pass Year</th>
                                <th>Model Year</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Color</th>
                                <th>Vehicle Photo</th>
                                <th>Selling Name</th>
                                <th>Model Name</th>
                                <th>Details</th>
                                <th>Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiclesInfos as $vehiclesInfo)
                            <tr>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->serial_no }}</td>
                                <td>
                                    <span class="badge badge-pill {{ $vehiclesInfo->registration_status == 'Registered'
												    ? 'badge-soft-success'
												    : ($vehiclesInfo->registration_status == 'On-Test'
												        ? 'badge-soft-danger'
												        : '') }} font-size-12">
                                        {{ $vehiclesInfo->registration_status }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-pill {{ $vehiclesInfo->paper_status == 'Provided'
												    ? 'badge-soft-success'
												    : ($vehiclesInfo->paper_status == 'Due'
												        ? 'badge-soft-danger'
												        : '') }} font-size-12">
                                        {{ $vehiclesInfo->paper_status }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-pill {{ $vehiclesInfo->bank_payment == 1
												    ? 'badge-soft-success'
												    : ($vehiclesInfo->bank_payment == 0
												        ? 'badge-soft-danger'
												        : '') }} font-size-12">
                                        {{ $vehiclesInfo->bank_payment == 1 ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-pill {{ $vehiclesInfo->service_book == 1
												    ? 'badge-soft-success'
												    : ($vehiclesInfo->service_book == 0
												        ? 'badge-soft-danger'
												        : '') }} font-size-12">
                                        {{ $vehiclesInfo->service_book == 1 ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->key }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->buying_price }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->delivery_charge }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->selling_price }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->first_purchase_date }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->gate_pass_year }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->model_year }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->chassis_no }}</td>
                                <td class="text-body fw-bold">{{ $vehiclesInfo->engine_no }}</td>
                                <td>{{ $vehiclesInfo->color?->name }}</td>
                                <td>{{ $vehiclesInfo->vehicle_photo }}</td>
                                <td>{{ $vehiclesInfo->ownable?->name }}</td>
                                <td>{{ $vehiclesInfo->vehicleModel?->name }}</td>
                                <td>{{ $vehiclesInfo->details }}</td>
                                <td>
                                    @if ($vehiclesInfo->vehicle_doc)
                                    <div class="d-grid d-block">
                                        <a class="btn btn-dark waves-effect btn-label waves-light" href="">
                                            Doc View<i class="bx bx-dollar label-icon "></i></a>
                                    </div>
                                    @else
                                    <span class="badge badge-pill badge-soft-primary font-size-12">
                                        Not Added
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="text-success"
                                            href="{{ route('vehicle.document.create', $vehiclesInfo->id) }}"
                                            title="Add Document">
                                            <i class="mdi mdi-plus font-size-18"></i>
                                        </a>
                                        <a class="text-primery"
                                            href="{{ route('vehicle-info.edit', $vehiclesInfo->id) }}" title="Edit">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        {{-- <form action="{{ route('vehicle-info.destroy', $vehiclesInfo->id) }}">
                                            @csrf
                                            <button class="btn p-0 text-danger"
                                                formaction="{{ route('vehicle-info.destroy', $vehiclesInfo->id) }}"
                                                formmethod="delete" type="submit"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                        </form> --}}
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
@section('script')
<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>\
<script type="text/javascript">
    $('#select-all').click(function(event) {
			if (this.checked) {
				$(':checkbox').prop('checked', true);
			} else {
				$(':checkbox').prop('checked', false);
			}
		});
</script>
@endsection
