@extends('layouts.master')

@section('title') Pre Owned Vehicles Sell @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Color Create @endslot

@endcomponent
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"> Color Form</h4>
                <form method="POST" action="{{route('colors.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <x-input label='Color Name' :required=true placeholder="Color Name" name="name"
                                value="{{old('name')}}">
                            </x-input>
                        </div>
                        <div class="col-xl-6">
                            <x-input label='Color Code' :required=true type="color" placeholder="Color Code" name="code"
                                value="{{old('code')}}">
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
                        <h4 class="card-title"> Color Table</h4>
                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($colors as $color)
                                    <tr>
                                        <td style="width: 80px">{{++$loop->index}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a class="text-success" href="{{route('colors.edit',$color->id)}}"
                                                    title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form method="post" id="{{'form_'.$color->id}}"
                                                    action="{{route('colors.destroy',$color->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0 text-danger"
                                                        data-id="{{$color->id}}"><i
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
