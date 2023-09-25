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
						<table class="table table-editable table-nowrap align-middle table-edits">
							<thead>
								<tr>
									<th>#SL</th>
									<th>Chassis No</th>
									<th>Engine No</th>
									<th>Color</th>
									<th>Current Status</th>
									<th>T. Amount</th>
									<th>Model Name</th>
									<th>T. Details</th>
									<th>WorkShop</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($vehiclesInfos as $vehiclesInfo)
									@php
										$transport = $vehiclesInfo->fees->where('workable_type', 'transport')->first();
									@endphp
									<tr data-id="{{ ++$loop->index }}">
										<td>{{ ++$loop->index }}</td>
										<td class="text-body fw-bold">{{ $vehiclesInfo->chassis_no }}</td>
										<td class="text-body fw-bold">{{ $vehiclesInfo->engine_no }}</td>
										<td>{{ $vehiclesInfo->color }}</td>
										<td>
											<span class="badge badge-pill badge-soft-warning font-size-12">{{ $vehiclesInfo->current_status }}</span>
										</td>
										<td>{{ $transport->amount ?? 'Not Set' }}</td>
										<td>{{ $vehiclesInfo->vehicleModel->name }}</td>
										<td>{{ $transport->details ?? 'Not Set' }}</td>
										<td>
											<a class="btn btn-warning waves-effect btn-label waves-light"
												href="{{ route('vehicle.transport.workshop', $vehiclesInfo->id) }}">
												Send WorkShop <i class="bx bx-right-arrow-alt label-icon "></i></a>
										</td>
										<td>
											<div class="d-flex gap-3">
												@if ($transport)
													<a class="text-success" href="{{ route('vehicle.transport.create', $vehiclesInfo->id) }}">
														<i class="mdi mdi-pencil font-size-18"></i>
													</a>
													<form id="{{ 'form_' . $vehiclesInfo->id }}" method="post"
														action="{{ route('vehicle.transport.destroy', $vehiclesInfo->id) }}">
														@csrf
														@method('DELETE')
														<button class="btn p-0 text-danger" data-id="{{ $vehiclesInfo->id }}" type="submit"><i
																class="mdi mdi-delete font-size-18"></i></button>
													</form>
												@else
													<a class="text-success" href="{{ route('vehicle.transport.edit', $vehiclesInfo->id) }}" title="Edit">
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
