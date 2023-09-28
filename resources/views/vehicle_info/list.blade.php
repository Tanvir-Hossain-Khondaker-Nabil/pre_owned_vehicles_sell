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
		@slot('li_1')
			Dashboard
		@endslot
		@slot('title')
			Supplier List
		@endslot
	@endcomponent
	<div class="row">
		<form accept="{{ route('bulk.status.change') }}" method="POST">
			@csrf
			<div class="row row-cols-lg-auto g-3 justify-content-center">
				<div class="col-12 ">
					<select class="form-select" name="current_status" required>
						<option value="" selected>Choose...</option>
						<option value="transport">Transport</option>
						<option value="workshop">Workshop</option>
						<option value="wash_color">Wash OR Color</option>
						<option value="garage">Garage</option>
					</select>
				</div>
				<div class="col-12">
					<button class="btn btn-primary w-md" formmethod='post' formaction={{ route('bulk.status.change') }}
						type="submit">Submit</button>
				</div>
				{{-- <div class="col-12">
					<div class="btn btn-success" id="select-all">Check All</div>
				</div> --}}

			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Supplier Table</h4>
						<div class="table-responsive">
							<table class="table table-bordered dt-responsive w-100" id="datatable-buttons">
								<thead>
									<tr>
										<th>#SL</th>
										<th>All</th>
										<th>Chassis No</th>
										<th>Serial No</th>
										<th>Engine No</th>
										<th>Color</th>
										<th>Current Status</th>
										<th>Owner Name</th>
										<th>Model Name</th>
										<th>Details</th>
										<th>Document</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($vehiclesInfos as $vehiclesInfo)
										<tr>
											<td>{{ ++$loop->index }}</td>
											<td>
												<div class="form-check form-check-success ms-3">
													<input class="form-check-input" name="vehicles_info_id[{{ $vehiclesInfo->id }}]" type="checkbox"
														value="{{ $vehiclesInfo->id }}">
												</div>
											</td>
											<td class="text-body fw-bold">{{ $vehiclesInfo->serial_no }}</td>
											<td class="text-body fw-bold">{{ $vehiclesInfo->chassis_no }}</td>
											<td class="text-body fw-bold">{{ $vehiclesInfo->engine_no }}</td>
											<td>{{ $vehiclesInfo->color }}</td>
											<td>
												<span
													class="badge badge-pill {{ $vehiclesInfo->current_status == 'transport' ? 'badge-soft-warning' : ($vehiclesInfo->current_status == 'garage' ? 'badge-soft-success' : ($vehiclesInfo->current_status == 'wash_color' ? 'badge-soft-success' : ($vehiclesInfo->current_status == 'workshop' ? 'badge-soft-primary' : ''))) }} font-size-12">
													{{ $vehiclesInfo->current_status }}
												</span>
											</td>
											<td>{{ $vehiclesInfo->ownable->name }}</td>
											<td>{{ $vehiclesInfo->vehicleModel->name }}</td>
											<td>{{ $vehiclesInfo->details }}</td>
											<td class="">
												@if ($vehiclesInfo->documents->count() > 0)
													<div class="d-grid d-block">
														<a class="btn btn-dark waves-effect btn-label waves-light"
															href="{{ route('vehicle.document.view', $vehiclesInfo->id) }}">
															Doc View ({{ $vehiclesInfo->documents->count() }})<i class="bx bx-dollar label-icon "></i></a>
													</div>
												@else
													<span class="badge badge-pill badge-soft-primary font-size-12">
														Not Added
													</span>
												@endif
											</td>
											<td>
												<div class="d-flex gap-3">
													<a class="text-success" href="{{ route('vehicle.document.create', $vehiclesInfo->id) }}"
														title="Add Document">
														<i class="mdi mdi-plus font-size-18"></i>
													</a>
													<a class="text-primery" href="{{ route('vehicle-info.edit', $vehiclesInfo->id) }}" title="Edit">
														<i class="mdi mdi-pencil font-size-18"></i>
													</a>
													{{-- <form action="{{ route('vehicle-info.destroy', $vehiclesInfo->id) }}">
														@csrf
														<button class="btn p-0 text-danger" formaction="{{ route('vehicle-info.destroy', $vehiclesInfo->id) }}"
															formmethod="delete" type="submit"><i class="mdi mdi-delete font-size-18"></i></button>
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
		</form>
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
