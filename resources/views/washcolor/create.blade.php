@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@if(isset($edit))
@slot('title') Wash Color Edit @endslot
@else
@slot('title') Wash Color Create @endslot
@endif

@endcomponent
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Wash Color Form</h4>
                <form method="POST"
                    action="{{(@$washcolor) ? route('washcolors.update',$washcolor->id) : route('washcolors.store')}}"
                    enctype="multipart/form-data">
                    @csrf

                    @if(isset($washcolor))
                    @method('put')
                    @endif
                    <div class="row">
                        <div class="col-xl-6">
                            <x-input label='Wash Color Name' :required=true placeholder="Enter Color Name" name="work"
                                value="{{@$washcolor->work ?? old('work')}}">
                            </x-input>
                        </div>

                        <div class="col-xl-6">
                            <x-input label='Amount' :required=true type="number" placeholder="Enter Your Amount"
                                name="amount" value="{{@$washcolor->amount ?? old('amount')}}">
                            </x-input>
                        </div>


                        <div class="col-xl-12 m-4">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">
                                    {{(@$washcolor)?'Update':'Submit'}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Wash Color Table</h4>
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>ID</th>

                                        <th>Work</th>
                                        <th>Amount</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sl=1
                                    @endphp                                   
                                    @foreach($washcolors as $washcolor)
                                    <tr data-id="{{$sl++}}">
                                        <td data-field="id" style="width: 80px">{{$sl}}</td>

                                        <td data-field="work">{{$washcolor->work}}</td>
                                        <td data-field="amount">{{$washcolor->amount}}</td>

                                        <td>
                                            <div class="d-flex gap-3">
                                                <a class="text-success"
                                                    href="{{route('washcolors.edit',$washcolor->id)}}" title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form method="post" id="{{'form_'.$washcolor->id}}"
                                                    action="{{route('washcolors.destroy',$washcolor->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0 text-danger"
                                                        data-id="{{$washcolor->id}}"><i
                                                            class="mdi mdi-delete font-size-18"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        {{-- <td style="width: 100px">
                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                href="{{route('washcolors.edit', $washcolor->id)}}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" id="{{'form_'.$washcolor->id}}"
                                                action="{{route('washcolors.destroy', $washcolor->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm delete"
                                                    data-id="{{$washcolor->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                    {{-- @foreach($washcolors as $washcolor)
                                    <tr data-id="{{$sl++}}">
                                        <td data-field="id" style="width: 80px">{{$sl++}}</td>

                                        <td data-field="work">{{$washcolors->work}}</td>
                                        <td data-field="amount">{{$washcolors->amount}}</td>

                                        <td style="width: 100px">
                                            <a class="btn btn-outline-secondary btn-sm edit"
                                                href="{{route('washcolors.edit',$washcolor->id)}}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" id="{{'form_'.$washcolor->id}}"
                                                action="{{route('washcolors.destroy',$washcolor->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm delete"
                                                    data-id="{{$washcolor->id}}"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<!-- end card -->
@endsection