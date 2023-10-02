@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($payment))
@slot('title') Payment Edit @endslot
@else
@slot('title') Payment Create @endslot
@endif

@endcomponent

<div class="row">
    <div class="card col-xl-6">
        <div class="card-body">

            <form method="POST" action="{{(@$payment) ? route('payments.update',$payment->id) : route('payments.store')}}" enctype="multipart/form-data">
                @csrf

                @if(isset($payment))
                @method('put')
                @endif
                <div class="row">
                    <div class="col-xl-6">
                        <x-input label='Date' type="date" :required=true placeholder="Choose Date" name="date" value="{{@$payment->date ?? old('date')}}">
                        </x-input>
                    </div>


                    <div class="col-xl-6">
                        <x-input label='Reference' type="text" :required=true placeholder="Type Reference Number" name="reference_no" value="{{@$payment->reference_no ?? old('reference_no')}}">
                        </x-input>
                    </div>

                    <div class="col-xl-6 mt-2">
                        <div class="form-group">
                            <label class="form-label-lg fs-5 mx-3" for="status">Account Name <code>*</code></label>
                            <select class="form-control" name="account_id" id="account_id">
                                @if(isset($expense))
                                <option value="{{$expense->account_id}}">{{$expense->account->account_name}}</option>
                                @else
                                <option value=" ">Select</option>
                                @endif
                                @foreach($accounts as $key=>$account)
                                <option value="{{$key}}">{{$account}}</option>
                                @endforeach
                            </select>

                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                +
                            </button>
                        @error('account_id')
                        <code>*{{$message}}</code>
                        @enderror
                        </div>



                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Customer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <x-input label='Name' :required=true placeholder="Enter Your Name" name="name" value="{{@$customer->name ?? old('name')}}">
                                                </x-input>
                                            </div>

                                            <div class="col-xl-6">
                                                <label class="form-label-lg fs-5 mx-3" for="avatar">Upload Image</label>
                                                <input type="file"
                                                    class="form-control rounded-pill form-control-lg ps-3" value="{{ old('avatar')}}" name="avatar" />
                                                @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <x-input label='Email' :required=true type="email" placeholder="Enter Your Email"
                                                    name="email" value="{{@$customer->email ?? old('email')}}">
                                                </x-input>
                                            </div>

                                            <div class="col-xl-6">
                                                <x-input label='NID' :required=true type="number" placeholder="Enter Your NID"
                                                    name="nid" value="{{@$customer->nid ?? old('nid')}}">
                                                </x-input>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <x-input label='Phone' :required=true type="tel" placeholder="Enter Your Phone"
                                                    name="phone" value="{{@$customer->phone ?? old('phone')}}">
                                                </x-input>
                                            </div>

                                            <div class="col-xl-6">
                                                <x-input label='Driving License No' :required=true type="number"
                                                    placeholder="Enter Your Driving License No" name="driving_license_no" value="{{@$customer->driving_license_no ?? old('driving_license_no')}}">
                                                </x-input>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mt-2">
                                                <label class="form-label-lg fs-5 mx-3" for="avater">Address</label>
                                                    <textarea class="form-control rounded-pill form-control-lg ps-3" required name="address" id="" cols="30" rows="2" placeholder="Enter Your Address" value="{{old('address')}}">{{ @$customer->address  }}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6">
                        <x-input label='Amount' type="number" :required=true placeholder="$" name="amount" value="{{@$payment->amount ?? old('amount')}}">
                        </x-input>
                    </div>

                    <div class="col-xl-12 m-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-md"> {{(@$vehicle)?'Update':'Submit'}}</button>
                        </div>
                    </div>
                </div>
            </form>



            <div class="col-xl-auto">
                <div class="card">
                    <div class="card-body">

                        <div class="col-xl-auto">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Search Product by Name/Code">
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
                    <th data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class=" btn-outline-primary">Discount</th>
                    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Order Discount</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Order Discount Type</label>
                                                <select class="form-control" name="account_id" id="account_id">
                                                    @if(isset($expense))
                                                    <option value="{{$expense->account_id}}">{{$expense->account->account_name}}</option>
                                                    @else
                                                    <option value=" ">Select</option>
                                                    @endif
                                                    @foreach($accounts as $key=>$account)
                                                    <option value="{{$key}}">{{$account}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3">
                                                <label>Value</label>
                                                <input type="text" class="form-control" id="formrow-firstname-input">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>

                <tr>
                    <th>Cupon</th>
                    <th>Tax</th>

                    {{-- Shipping Cost --}}
                    <th data-bs-toggle="modal" data-bs-target="#shippingcost" class=" btn-outline-primary">Shipping</th>
                    <div class="modal fade" id="shippingcost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="shippingcost">Shipping Cost</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-auto">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter shipping cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            </thead>
        </table>
    </div>
    <!-- end card -->


    <div class="card col-xl-6">
        <div class="row">
            <div class="col-xl-4">
                <button type="button" class="btn btn-primary waves-effect waves-light" style="width: 200px;">Catagory</button>
            </div>

            <div class="col-xl-4">
                <button type="button" class="btn btn-primary waves-effect waves-light" style="width: 200px;">Brand</button>
            </div>

            <div class="col-xl-4">
                <button type="button" class="btn btn-primary waves-effect waves-light" style="width: 200px;">Feature</button>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderless mb-0">

                    <thead>
                        <tr >
                            <th class="text-center">No data available in table</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">

        <button type="button" class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-smile font-size-16 align-middle me-2"></i> Card
        </button>


        <button type="button" class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-smile font-size-16 align-middle me-2"></i> Cash
        </button>


        <button type="button" class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-smile font-size-16 align-middle me-2"></i> Draft
        </button>

        <button type="button" class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-smile font-size-16 align-middle me-2"></i> Cancel
        </button>

        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#recenttransaction">
            Recent Transaction
        </button>

        <div class="modal fade" id="recenttransaction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="recenttransaction">Recent Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
