@extends('layouts.timeline')


@section('head')
	<style>
		.eventInfo {
				margin-left: 50px;
				margin-bottom: 25px;
		}
	</style>
@stop

	
@section('main')
	<h3>Edit Timeline: {{ $timeline->name }}</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" value="{{ $timeline->name }}" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" class="form-control" name="description" rows="4">{{ $timeline->description }}</textarea>
			</div>
	
			<h4>Events:</h4>
			@for ($e = 0; $e < count($timeline_events); $e++)
				<input id="event_id{{ $e }}" type="hidden" name="event_id{{ $e }}" value="{{ $timeline_events[$e]->id }}">
				<div class="checkbox">
					<label>
						<input id="delete_event{{ $e }}" type="checkbox" name="delete_event{{ $e }}" value="true"> Delete Event
					</label>
				</div>
				<p>{{ $timeline_events[$e]->start_date }} - {{ $timeline_events[$e]->end_date }}</p>
				<div class="eventInfo">
					<a href='/timelines/{{ $timeline->id }}/events/{{ $timeline_events[$e]->id }}'>{{ $timeline_events[$e]->name }}</a><br>
						{{ $timeline_events[$e]->description }}
				</div>
			@endfor
			<button class="btn btn-primary">Submit</button>
		</form>
	
	@else
		<h4>{{ $timeline->name }} has been updated.<h4>
	@endif	
@stop