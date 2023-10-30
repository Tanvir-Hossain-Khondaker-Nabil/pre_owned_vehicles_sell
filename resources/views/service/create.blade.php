@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Service Create @endslot

@endcomponent
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"> Service Form</h4>
                <form method="POST" action="{{route('services.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <x-input label='Service Name' :required=true placeholder="Service Name" name="name"
                                value="{{old('name')}}">
                            </x-input>
                        </div>
                        <div class="col-xl-6">
                            <x-input label='Price' :required=true type="number" placeholder="Price" name="price"
                                value="{{old('price')}}">
                            </x-input>
                        </div>
                        <div class="col-xl-12">
                            <x-input label='Description' type="text" placeholder="Description" name="description"
                                value="{{old('description')}}">
                            </x-input>
                        </div>
                        <div class="col-xl-12 m-4">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
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
                        <h4 class="card-title"> Services Table</h4>
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                        <td style="width: 80px">{{++$loop->index}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->price}}</td>
                                        <td>{{$service->description}}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a class="text-success" href="{{route('colors.edit',$service->id)}}"
                                                    title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form method="post" id="{{'form_'.$service->id}}"
                                                    action="{{route('colors.destroy',$service->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0 text-danger"
                                                        data-id="{{$service->id}}"><i
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
    </div>
</div>
<!-- end card -->
@endsection
