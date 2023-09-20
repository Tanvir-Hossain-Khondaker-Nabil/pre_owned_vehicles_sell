@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Work Shop List @endslot
@endcomponent
    {{-- <div class="page-content"> --}}
        <div class="container-fluid">



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"> Shop Table</h4>
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>

                                            <th>Name</th>
                                            {{-- <th>Amount</th> --}}

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sl=1
                                        @endphp



                                        @foreach($documents as $documents)

                                        <tr data-id="{{$sl++}}">
                                            <td data-field="id" style="width: 80px">{{$sl}}</td>

                                            <td data-field="name">{{$documents->name}}</td>
                                            
                                            {{-- <td data-field="amount">{{$workshop->amount}}</td> --}}

                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a class="text-success" href="{{route('vehicledoc.edit',$documents->id)}}"
                                                        title="Edit">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form method="post" id="{{'form_'.$documents->id}}"
                                                        action="{{route('vehicledoc.destroy',$documents->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 text-danger"
                                                            data-id="{{$documents->id}}"><i
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
