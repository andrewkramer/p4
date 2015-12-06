@extends('layouts.timeline')

	
@section('main')
	<h3>Edit Event: {{ $event->name }}</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}/events/{{ $event->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" value="{{ $event->name }}" >
			</div>
			<div class="form-group">
				<label for="start_date">Start Date</label>
				<input id="start_date" class="form-control" type="text" name="start_date" value="{{ $event->start_date }}" >
			</div>
			<div class="form-group">
				<label for="end_date">End Date</label>
				<input id="end_date" class="form-control" type="text" name="end_date" value="{{ $event->end_date }}" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" class="form-control" name="description" rows="4">{{ $event->description }}</textarea>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $event->name }} has been updated.<h4>
	@endif	
@stop