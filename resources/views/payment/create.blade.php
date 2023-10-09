@extends('layouts.master')
@section('title')
	Pre Owned Vehicles Sell
@endsection
@section('content')
	@component('components.breadcrumb')
		@slot('li_1')
			Dashboard
		@endslot
		@if (isset($payment))
			@slot('title')
				Payment Edit
			@endslot
		@else
			@slot('title')
				Payment Create
			@endslot
		@endif
	@endcomponent
	<livewire:vehicle-sale />
@endsection
