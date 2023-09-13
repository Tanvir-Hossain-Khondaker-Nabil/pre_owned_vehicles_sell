@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Supplier List @endslot
@endcomponent
    {{-- <div class="page-content"> --}}
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Editable Table</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Editable Table</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div> --}}
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Supplier Table</h4>
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Driving License No</th>
                                            <th>Email</th>
                                            <th>NID</th>
                                            <th>Phone One</th>
                                            <th>Phone Two</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sl=1
                                        @endphp

                                        @foreach($suppliers as $supplier)
                                        <tr data-id="{{$sl++}}">
                                            <td data-field="id" style="width: 80px">{{$sl++}}</td>
                                            <td data-field="avatar" style="width: 80px"><img src="{{$supplier->avatar}}" class="img-fluid" alt=""></td>
                                            <td data-field="name">{{$supplier->name}}</td>
                                            <td data-field="driving_license_no">{{$supplier->driving_license_no}}</td>
                                            <td data-field="email">{{$supplier->email}}</td>
                                            <td data-field="nid">{{$supplier->nid}}</td>
                                            <td data-field="phone_1">{{$supplier->phone_1}}</td>
                                            <td data-field="phone_2">{{$supplier->phone_2}}</td>
                                            <td data-field="address" >{{$supplier->address}}</td>
                                            <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit"  href="{{route('suppliers.edit',$supplier->id)}}" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="post" id="{{'form_'.$supplier->id}}" action="{{route('suppliers.destroy',$supplier->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm delete" data-id="{{$supplier->id}}"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    {{-- </div> --}}
    <!-- End Page-content -->

    
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection