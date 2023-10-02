@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Account Statement List @endslot
@endcomponent
    {{-- <div class="page-content"> --}}
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 class="card-title">Account Statement Table</h4>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex gap-1">
                                        <span class="badge bg-primary" style="padding: 6px 10px"><i class="fa-regular fa-file-pdf" style="font-size:16px"></i></span>
                                        <span class="badge bg-success" style="padding: 6px 10px"><i class="fa-regular fa-file-excel" style="font-size:16px"></i></span>
                                        <span class="badge bg-info" style="padding: 6px 10px"><i class="fa-solid fa-print" style="font-size:16px"></i></span>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Account No</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-field="id" style="width: 80px">1</td>
                                            <td data-field="account_name">Expense</td>
                                            <td data-field="account_name">1</td>
                                            <td data-field="account_name">1000</td>
                                            <td data-field="account_name">1000</td>
                                            <td data-field="account_name">1000</td>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th></th>
                                            <th>1000</th>
                                            <th>1000</th>
                                            <th>1000</th>
                                        </tr>
                                    </tfoot>
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
