@extends('layouts.master')
@section('title')
	Pre Owned Vehicles Sell
@endsection
@section('content')
	@component('components.breadcrumb')
		@slot('li_1')
			Dashboard
		@endslot
		@if (isset($payment))
			@slot('title')
				Payment Edit
			@endslot
		@else
			@slot('title')
				Payment Create
			@endslot
		@endif
	@endcomponent
	<div class="row">
		<div class="card col-xl-6">
			<div class="row">
				<div class="col-xl-6">
					<div class="card-body">
						<form method="POST" action="{{ @$payment ? route('payments.update', $payment->id) : route('payments.store') }}"
							enctype="multipart/form-data">
							@csrf
							@if (isset($payment))
								@method('put')
							@endif
							<div class="row">
								<div class="col-xl-6">
									<x-input name="date" type="date" value="{{ @$payment->date ?? old('date') }}" label='Date'
										:required=true placeholder="Choose Date">
									</x-input>
								</div>
								<div class="col-xl-6">
									<x-input name="reference_no" type="text" value="{{ @$payment->reference_no ?? old('reference_no') }}"
										label='Reference' :required=true placeholder="Type Reference Number">
									</x-input>
								</div>
								<div class="col-xl-6 mt-2">
									<div class="form-group">
										<label class="form-label-lg fs-5 mx-3" for="status">Account Name <code>*</code></label>
										<select class="form-control" id="account_id" name="account_id">
											@if (isset($expense))
												<option value="{{ $expense->account_id }}">{{ $expense->account->account_name }}</option>
											@else
												<option value=" ">Select</option>
											@endif
											@foreach ($accounts as $key => $account)
												<option value="{{ $key }}">{{ $account }}</option>
											@endforeach
										</select>
										<button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
											data-bs-target="#staticBackdrop" type="button">
											+
										</button>
										@error('account_id')
											<code>*{{ $message }}</code>
										@enderror
									</div>

									<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
										aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">Add Customer</h5>
													<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
												</div>
												<div class="modal-body">

													<div class="row">
														<div class="col-xl-6">
															<x-input name="name" value="{{ @$customer->name ?? old('name') }}" label='Name' :required=true
																placeholder="Enter Your Name">
															</x-input>
														</div>

														<div class="col-xl-6">
															<label class="form-label-lg fs-5 mx-3" for="avatar">Upload Image</label>
															<input class="form-control rounded-pill form-control-lg ps-3" name="avatar" type="file"
																value="{{ old('avatar') }}" />
															@error('avatar')
																<div class="invalid-feedback">{{ $message }}</div>
															@enderror
														</div>
													</div>

													<div class="row">
														<div class="col-xl-6">
															<x-input name="email" type="email" value="{{ @$customer->email ?? old('email') }}" label='Email'
																:required=true placeholder="Enter Your Email">
															</x-input>
														</div>

														<div class="col-xl-6">
															<x-input name="nid" type="number" value="{{ @$customer->nid ?? old('nid') }}" label='NID'
																:required=true placeholder="Enter Your NID">
															</x-input>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-6">
															<x-input name="phone" type="tel" value="{{ @$customer->phone ?? old('phone') }}" label='Phone'
																:required=true placeholder="Enter Your Phone">
															</x-input>
														</div>

														<div class="col-xl-6">
															<x-input name="driving_license_no" type="number"
																value="{{ @$customer->driving_license_no ?? old('driving_license_no') }}" label='Driving License No'
																:required=true placeholder="Enter Your Driving License No">
															</x-input>
														</div>
													</div>

													<div class="row">
														<div class="mt-2">
															<label class="form-label-lg fs-5 mx-3" for="avater">Address</label>
															<textarea class="form-control rounded-pill form-control-lg ps-3" id="" name="address"
															 value="{{ old('address') }}" required cols="30" rows="2" placeholder="Enter Your Address">{{ @$customer->address }}</textarea>
															@error('address')
																<div class="invalid-feedback">{{ $message }}</div>
															@enderror
														</div>
													</div>

												</div>
												<div class="modal-footer">
													<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
													<button class="btn btn-primary" type="button">Insert</button>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="col-xl-6">
									<x-input name="amount" type="number" value="{{ @$payment->amount ?? old('amount') }}" label='Amount'
										:required=true placeholder="$">
									</x-input>
								</div>

								<div class="col-xl-12 m-4">
									<div>
										<button class="btn btn-primary w-md" type="submit"> {{ @$vehicle ? 'Update' : 'Submit' }}</button>
									</div>
								</div>
							</div>
						</form>

						<div class="col-xl-auto">
							<div class="card">
								<div class="card-body">

									<div class="col-xl-auto">
										<div class="mb-3">
											<input class="form-control" id="formrow-firstname-input" type="text"
												placeholder="Search Product by Name/Code">
										</div>
									</div>

									<div class="table-responsive">
										<table class="table table-borderless mb-0">

											<thead>
												<tr>
													<th>Product</th>
													<th>Batch No</th>
													<th>Price</th>
													<th>Quantity</th>
													<th>SubTotal</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
													<td>1000</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
													<td>2510</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>Larry</td>
													<td>the Bird</td>
													<td>@twitter</td>
													<td>541515</td>
												</tr>
											</tbody>
										</table>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- end card body -->

					<table class="table table-borderless mb-0">

						<thead>
							<tr>
								<th>Item</th>
								<th>Total</th>

								{{-- Discount --}}
								<th class=" btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Discount</th>
								<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
									role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Order Discount</h5>
												<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-xl-6">
														<div class="mb-3">
															<label>Order Discount Type</label>
															<select class="form-control" id="account_id" name="account_id">
																@if (isset($expense))
																	<option value="{{ $expense->account_id }}">{{ $expense->account->account_name }}</option>
																@else
																	<option value=" ">Select</option>
																@endif
																@foreach ($accounts as $key => $account)
																	<option value="{{ $key }}">{{ $account }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="mb-3">
															<label>Value</label>
															<input class="form-control" id="formrow-firstname-input" type="text">
														</div>
													</div>
												</div>

											</div>
											<div class="modal-footer">
												<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
												<button class="btn btn-primary" type="button">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</tr>

							<tr>
								<th>Cupon</th>
								<th>Tax</th>

								{{-- Shipping Cost --}}
								<th class=" btn-outline-primary" data-bs-toggle="modal" data-bs-target="#shippingcost">Shipping</th>
								<div class="modal fade" id="shippingcost" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
									aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="shippingcost">Shipping Cost</h5>
												<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="col-xl-auto">
													<div class="mb-3">
														<input class="form-control" id="formrow-firstname-input" type="text"
															placeholder="Enter shipping cost">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
												<button class="btn btn-primary" type="button">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</tr>
						</thead>
					</table>
				</div>
				<div class="col-xl-6">

					<button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#card"
						type="button">
						<i class="bx bx-smile font-size-16 align-middle me-2"></i> Card
					</button>

					<div class="modal fade" id="card" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
						aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="card">Finalize Sale</h5>
									<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Received Amount</label>
												<input class="form-control" id="formrow-firstname-input" type="text"
													placeholder="Enter received amount">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Paying Amount</label>
												<input class="form-control" id="formrow-firstname-input" type="text"
													placeholder="Enter paying amount">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Change</label>
												<input class="form-control" id="formrow-firstname-input" type="text" placeholder="">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Payed By</label>
												<select class="form-control" id="pay_by" name="pay_by">
													<option value=" ">Select</option>
													<option value="Cash">Cash</option>
													<option value="Card">Credit Card</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12">
											<div class="mb-3">
												<label>Credit Card Number</label>
												<input class="form-control" id="formrow-firstname-input" type="Number"
													placeholder="Enter Credit Card Number" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12">
											<div class="mb-3">
												<label>Payment Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter payment note"></textarea>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="mb-3">
												<label>Sale Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter sale note"></textarea>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="mb-3">
												<label>Staff Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter staff note"></textarea>
											</div>
										</div>
									</div>

								</div>
								<div class="modal-footer">
									<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
									<button class="btn btn-primary" type="button">Submit</button>
								</div>
							</div>
						</div>
					</div>

					<button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#cash"
						type="button">
						<i class="bx bx-smile font-size-16 align-middle me-2"></i> Cash
					</button>

					<div class="modal fade" id="cash" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
						aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="cash">Finalize Sale</h5>
									<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Received Amount</label>
												<input class="form-control" id="formrow-firstname-input" type="text"
													placeholder="Enter received amount">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Paying Amount</label>
												<input class="form-control" id="formrow-firstname-input" type="text"
													placeholder="Enter paying amount">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Change</label>
												<input class="form-control" id="formrow-firstname-input" type="text" placeholder="">
											</div>
										</div>

										<div class="col-xl-3">
											<div class="mb-3">
												<label>Payed By</label>
												<select class="form-control" id="pay_by" name="pay_by">
													<option value=" ">Select</option>
													<option value="Cash">Cash</option>
													<option value="Card">Credit Card</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12">
											<div class="mb-3">
												<label>Payment Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter payment note"></textarea>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="mb-3">
												<label>Sale Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter sale note"></textarea>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="mb-3">
												<label>Staff Note</label>
												<textarea class="form-control" id="formrow-firstname-input" type="text" placeholder="Enter staff note"></textarea>
											</div>
										</div>
									</div>

								</div>
								<div class="modal-footer">
									<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
									<button class="btn btn-primary" type="button">Submit</button>
								</div>
							</div>
						</div>
					</div>

					<button class="btn btn-primary waves-effect waves-light" type="button">
						<i class="bx bx-smile font-size-16 align-middle me-2"></i> Draft
					</button>

					<button class="btn btn-primary waves-effect waves-light" type="button">
						<i class="bx bx-smile font-size-16 align-middle me-2"></i> Cancel
					</button>

					<button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
						data-bs-target="#recenttransaction" type="button">
						Recent Transaction
					</button>

					<div class="modal fade" id="recenttransaction" data-bs-backdrop="static" data-bs-keyboard="false"
						role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="recenttransaction">Recent Transaction</h5>
									<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="col-xl-auto">
										<div class="table-responsive">
											<h6 class="modal-title" id="recenttransaction">Sale</h6>
											<table class="table table-editable table-nowrap align-middle table-edits">
												<thead>
													<tr>
														<th>Date</th>
														<th>Reference</th>
														<th>Customer</th>
														<th>Grand Total</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr data-id="1">
														<td data-field="id" style="width: 80px">06-08-2023</td>
														<td data-field="name">sr-2023-0805</td>
														<td data-field="age">MD Real</td>
														<td data-field="gender">123000</td>
														<td style="width: 100px">
															<a class="btn btn-outline-secondary btn-sm edit" title="Edit">
																<i class="fas fa-pencil-alt"></i>
															</a>
														</td>
													</tr>
													<tr data-id="2">
														<td data-field="id" style="width: 80px">06-08-2023</td>
														<td data-field="name">sr-2023-0805</td>
														<td data-field="age">MD Real</td>
														<td data-field="gender">123000</td>
														<td>
															<a class="btn btn-outline-secondary btn-sm edit" title="Edit">
																<i class="fas fa-pencil-alt"></i>
															</a>
														</td>
													</tr>
													<tr data-id="3">
														<td data-field="id" style="width: 80px">06-08-2023</td>
														<td data-field="name">sr-2023-0805</td>
														<td data-field="age">MD Real</td>
														<td data-field="gender">123000</td>
														<td>
															<a class="btn btn-outline-secondary btn-sm edit" title="Edit">
																<i class="fas fa-pencil-alt"></i>
															</a>
														</td>
													</tr>
													<tr data-id="4">
														<td data-field="id" style="width: 80px">06-08-2023</td>
														<td data-field="name">sr-2023-0805</td>
														<td data-field="age">MD Real</td>
														<td data-field="gender">123000</td>
														<td>
															<a class="btn btn-outline-secondary btn-sm edit" title="Edit">
																<i class="fas fa-pencil-alt"></i>
															</a>
														</td>
													</tr>
													<tr data-id="5">
														<td data-field="id" style="width: 80px">06-08-2023</td>
														<td data-field="name">sr-2023-0805</td>
														<td data-field="age">MD Real</td>
														<td data-field="gender">123000</td>
														<td>
															<a class="btn btn-outline-secondary btn-sm edit" title="Edit">
																<i class="fas fa-pencil-alt"></i>
															</a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
									<button class="btn btn-primary" type="button">Submit</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end card -->

		<div class="card col-xl-6">
			<div class="row">
				<div class="col-xl-4">
					<button class="btn btn-primary waves-effect waves-light" type="button" style="width: 200px;">Catagory</button>
				</div>

				<div class="col-xl-4">
					<button class="btn btn-primary waves-effect waves-light" type="button" style="width: 200px;">Brand</button>
				</div>

				<div class="col-xl-4">
					<button class="btn btn-primary waves-effect waves-light" type="button" style="width: 200px;">Feature</button>
				</div>
			</div>

			<div class="row">
				<div class="table-responsive">
					<table class="table table-borderless mb-0">

						<thead>
							<tr>
								<th class="text-center">No data available in table</th>
							</tr>
						</thead>

					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
