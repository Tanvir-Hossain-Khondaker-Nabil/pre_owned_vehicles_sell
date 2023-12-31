<div class="row">
    <div class="card col-xl-6">
        <form wire:submit=save>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 @error('customer_id') is-invalid @enderror">
                                    <label class="form-label form-label-lg fs-5 mx-3">Select Customer</label>
                                    <div class="input-group">
                                        <select class="form-control form-control-lg" name="customer_id">
                                            <option value="">Select--</option>
                                            @forelse ($customers as $customer)
                                            <option value="{{$customer->id}}">{{ $customer->name}}</option>
                                            @empty
                                            <option value="">No Custoner Found</option>
                                            @endforelse
                                        </select>
                                        <strong type="button" class="input-group-text btn btn-success"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i
                                                class="bx bx-plus-medical" style="line-height: 2"></i></strong>
                                    </div>
                                </div>
                                @error('customer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <x-livewire-input name="date" type="date" label='Date' :required=true
                                    placeholder="Choose Date"></x-livewire-input>
                            </div>
                            <div class="col-xl-6">
                                <x-livewire-input name="reference_no" type="text" label='Reference' :required=true
                                    placeholder="Type Reference Number">
                                </x-livewire-input>
                            </div>
                        </div>
                        <div class="col-xl-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-xl-auto">
                                        <div class="m-0 position-relative">
                                            <input class="form-control" wire:model.live="search" type="search"
                                                placeholder="Search Product by Name/Code">
                                            <div class="position-relative fixed-bottom bg-secondary w-100">
                                                @foreach ($vehicles as $vehicle)
                                                <h5 class="btn font-size-18 text-start p-0 my-1 d-block"
                                                    style="line-height: 1.2;"
                                                    wire:click.prevent="addFromCart({{$vehicle->id}})">
                                                    {{$vehicle->chassis_no}} {{$vehicle->serial_no}}</h5>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0 text-center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%">Model</th>
                                                    <th style="width: 20%">Engine No</th>
                                                    <th style="width: 20%">Chassis No</th>
                                                    <th style="width: 20%">Color</th>
                                                    <th style="width: 20%">Model Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allCartVehicles as $cartVehicle)
                                                <tr>
                                                    <th class="p-0">
                                                        {{$cartVehicle->vehicleModel?->name}}</th>
                                                    <th class="p-0">{{$cartVehicle->engine_no}}</th>
                                                    <th class="p-0">{{$cartVehicle->chassis_no}}</th>
                                                    <th class="p-0">{{$cartVehicle->color?->name}}</th>
                                                    <th class="p-0 text-end">{{$cartVehicle->model_year}}</th>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 w-100" colspan="2">
                                                        <input type="text" name="" class=" w-100" placeholder="Remark">
                                                    </td>
                                                    <td class="p-0 w-100" colspan="2">
                                                        <select name="" id="" class="p-0 w-100">
                                                            <option selected value="">status</option>
                                                            <option value="All-Clear">All Clear</option>
                                                            <option value="Processing">Processing</option>
                                                        </select>
                                                    </td>
                                                    <td class="p-0 text-end">
                                                        <span class="btn p-0 text-danger"
                                                            wire:click.prevent='removeFromCart({{$cartVehicle->id}})'>
                                                            <i class="mdi mdi-delete font-size-18"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30%">Name</th>
                                                        <th style="width: 30%">Price</th>
                                                        <th style="width: 35%" colspan="1">Description</th>
                                                        <th style="width: 5%"></th>
                                                    </tr>
                                                </thead>
                                                @foreach ($allCartServices as $cartService)
                                                <tr>
                                                    <td class="p-0">{{$cartService->name}}</td>
                                                    <td class="p-0">{{$cartService->price}}</td>
                                                    <td class="p-0" colspan="1">{{$cartService->description}}</td>
                                                    <td class="p-0 text-end">
                                                        <span class="btn p-0 text-danger"
                                                            wire:click.prevent='removeServiceFromCart({{$cartService->id}})'>
                                                            <i class="mdi mdi-delete font-size-18"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
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
                                <th>Item: {{count($allCartVehicles) + count($allCartServices)}}</th>
                                <th>Total: {{$allTotal }}</th>

                                {{-- Discount --}}
                                <th class=" btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1">
                                    Discount</th>
                                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Order Discount</h5>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="w-100 mt-2">
                                                            <label class="form-label-lg fs-5 mx-3">Order Discount
                                                                Type</label>
                                                            <select class="form-control" id="discount_type"
                                                                wire:model="discount_type">
                                                                <option value="percentage">Percentage (%)</option>
                                                                <option value="fixed">Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <x-livewire-input name="discount_amount" type="number"
                                                            label='Discount Amount' placeholder="Discount Amount">
                                                        </x-livewire-input>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-dismiss="modal" type="button"
                                                    wire:click.prevent="discountSet()">Set</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                {{-- Shipping Cost --}}
                                <th class=" btn-outline-primary" data-bs-toggle="modal" data-bs-target="#shippingcost">
                                    Shipping</th>
                                <div class="modal fade" id="shippingcost" data-bs-backdrop="static"
                                    data-bs-keyboard="false" role="dialog" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="shippingcost">Shipping Cost</h5>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xl-auto">
                                                    <div class="mb-3">
                                                        <x-livewire-input name="shipping_cost" type="number"
                                                            label='Enter shipping cost'
                                                            placeholder="Enter shipping cost">
                                                        </x-livewire-input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-dismiss="modal" type="button"
                                                    wire:click.prevent="shippingCost">Set</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xl-12">

                    <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#card" type="button">
                        <i class="bx bx-smile font-size-16 align-middle me-2"></i> Card
                    </button>

                    <div class="modal fade" id="card" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="card">Finalize Sale</h5>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
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
                                                <input class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="">
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
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter payment note"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Sale Note</label>
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter sale note"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Staff Note</label>
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter staff note"></textarea>
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

                    <button class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#cash" type="button">
                        <i class="bx bx-smile font-size-16 align-middle me-2"></i> Cash
                    </button>

                    <div class="modal fade" id="cash" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cash">Finalize Sale</h5>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
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
                                                <input class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="">
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
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter payment note"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Sale Note</label>
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter sale note"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Staff Note</label>
                                                <textarea class="form-control" id="formrow-firstname-input" type="text"
                                                    placeholder="Enter staff note"></textarea>
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
                    <button class="btn btn-primary w-md" type="submit"> {{ @$vehicle ? 'Update' :
                        'Submit' }}</button>

                    <div class="modal fade" id="recenttransaction" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered custom-wide-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recenttransaction">Recent Transaction</h5>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                        aria-label="Close"></button>
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
                                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                                title="Edit">
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
                                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                                title="Edit">
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
                                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                                title="Edit">
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
                                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                                title="Edit">
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
                                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                                title="Edit">
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
        </form>
        <!--  Large modal example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <livewire:customer></livewire:customer>
        </div><!-- /.modal -->x
    </div>
    <!-- end card -->

    <div class="card col-xl-6">
        <div class="row">
            <div class="col-xl-4">
                <div class="btn-group w-100" role="group">
                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-primary waves-effect waves-light"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catagory <i class="mdi mdi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                        @forelse ($categories as $category)
                        <span class="dropdown-item btn"
                            wire:click.prevent="findVehicle({{$category->id}})">{{$category->company_name}}</span>
                        @empty
                        <span class="dropdown-item">Category Not Found</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <button class="btn btn-primary waves-effect waves-light" type="button"
                    style="width: 200px;">Brand</button>
            </div>

            <div class="col-xl-4">
                <span class="btn btn-primary waves-effect waves-light w-100"
                    wire:click.prevent="showAllServices()">Service</span>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderless mb-0">
                    @if ($showVehicles)
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Registration Status</th>
                            <th>Paper Status</th>
                            <th>Bank Payment</th>
                            <th>Service Book</th>
                            <th>Key</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($showVehicles as $vehiclesInfo)
                        <tr wire:click.prevent="addFromCart({{$vehiclesInfo->id}})" style="cursor: pointer">
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
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    @elseif ($showServices)
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($showServices as $showService)
                        <tr wire:click.prevent="addServiceFromCart({{$showService->id}})" style="cursor: pointer">
                            <td>{{$showService->name}}</td>
                            <td>{{$showService->price}}</td>
                            <td>{{$showService->description}}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    @endif

                </table>
            </div>
        </div>
    </div>
</div>
