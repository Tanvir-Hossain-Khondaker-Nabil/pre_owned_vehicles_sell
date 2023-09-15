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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Driving License No</th>
                                <th>Email</th>
                                <th>NID</th>
                                <th>Phone One</th>
                                <th>Phone Two</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr data-id="{{++$loop->index}}">
                                <td>{{++$loop->index}}</td>
                                <td class="text-body fw-bold">{{$supplier->name}}</td>
                                <td><img src="{{$supplier->avatar}}" class="rounded-circle avatar-md" alt="Profile Pic">
                                </td>
                                <td>{{$supplier->driving_license_no}}</td>
                                <td>{{$supplier->email}}</td>
                                <td>{{$supplier->nid}}</td>
                                <td>{{$supplier->phone_1}}</td>
                                <td>{{$supplier->phone_2}}</td>
                                <td>{{$supplier->address}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="text-success" href="{{route('suppliers.edit',$supplier->id)}}"
                                            title="Edit">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <form method="post" id="{{'form_'.$supplier->id}}"
                                            action="{{route('suppliers.destroy',$supplier->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-danger"
                                                data-id="{{$supplier->id}}"><i
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
