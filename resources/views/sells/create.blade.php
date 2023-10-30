@extends('layouts.master')
@section('title')
	Pre Owned Vehicles Sell
@endsection
@section('content')
	@component('components.breadcrumb')
		@slot('li_1')
			Dashboard
		@endslot
		@slot('title')
			Sell Create
		@endslot
	@endcomponent
	<livewire:vehicle-sale />
@endsection
