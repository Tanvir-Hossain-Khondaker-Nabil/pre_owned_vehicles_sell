@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Customer List @endslot
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
                    <table class="table table-editable align-middle table-edits">
                        <thead>
                            <tr>
                                <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Driving License No</th>
                                            <th>Email</th>
                                            <th>NID</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr data-id="{{++$loop->index}}">
                                <td>{{++$loop->index}}</td>
                                <td class="text-body fw-bold">{{$customer->name}}</td>
                                <td><img src="{{$customer->avatar}}" class="rounded-circle avatar-md" alt="Profile Pic">
                                </td>
                                <td>{{$customer->driving_license_no}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->nid}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a class="text-success" href="{{route('customers.edit',$customer->id)}}"
                                            title="Edit">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <form method="post" id="{{'form_'.$customer->id}}" action="{{route('customers.destroy',$customer->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 text-danger"
                                                data-id="{{$customer->id}}"><i
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