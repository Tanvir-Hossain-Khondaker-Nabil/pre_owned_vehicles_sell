@extends('layouts.master')

@section('title')
	Pre Owned Vehicles Sell
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
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Supplier Table</h4>
					<div class="table-responsive">
						<table class="table table-editable align-middle table-edits">
							<thead>
								<tr>
									<th>#SL</th>
									<th>Chassis No</th>
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
										<td>
											@if ($vehiclesInfo->documents->count() > 0)
												<a class="btn btn-dark waves-effect btn-label waves-light"
													href="{{ route('vehicle.document.view', $vehiclesInfo->id) }}">
													Doc View ({{ $vehiclesInfo->documents->count() }})<i class="bx bx-dollar label-icon "></i></a>
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
												<form id="{{ 'form_' . $vehiclesInfo->id }}" method="post"
													action="{{ route('vehicle-info.destroy', $vehiclesInfo->id) }}">
													@csrf
													@method('DELETE')
													<button class="btn p-0 text-danger" data-id="{{ $vehiclesInfo->id }}" type="submit"><i
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
