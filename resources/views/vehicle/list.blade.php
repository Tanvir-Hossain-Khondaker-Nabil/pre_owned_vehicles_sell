@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Vehicle List @endslot
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

                            <h4 class="card-title">Vehicle Table</h4>
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Company Name</th>
                                            <th>Company Logo</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sl=1
                                        @endphp

                                        @foreach($vehicles as $vehicle)
                                        <tr data-id="{{$sl++}}">
                                            <td data-field="id" style="width: 80px">{{$sl}}</td>

                                            <td data-field="company_name">{{$vehicle->company_name}}</td>
                                            <td>
                                                <img src="{{$vehicle->company_logo}}" style="border-radius: 50%; width: 100px; height: 100px;" alt="Profile Pic">
                                            </td>
                                            {{-- <td data-field="company_logo" style="width: 80px"><img src="{{$vehicle->company_logo}}" class="img-fluid" alt=""></td> --}}
                                            <td data-field="type">{{$vehicle->type}}</td>

                                            {{-- <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit"  href="{{route('vehicles.edit',$vehicle->id)}}" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="post" id="{{'form_'.$vehicle->id}}" action="{{route('vehicles.destroy',$vehicle->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm delete" data-id="{{$vehicle->id}}"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td> --}}
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a class="text-success" href="{{route('vehicles.edit',$vehicle->id)}}"
                                                        title="Edit">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form method="post" id="{{'form_'.$vehicle->id}}"
                                                        action="{{route('vehicles.destroy',$vehicle->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 text-danger"
                                                            data-id="{{$vehicle->id}}"><i
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
