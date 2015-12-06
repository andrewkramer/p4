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
	<h3>{{ $timeline->name }}</h3>
	<p>{{ $timeline->description }}</p>
	
	<h4>Events:</h4>
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/events">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">New Event</button>
		</form>
	@endif
	@foreach ($timeline_events as $event)
		<p>{{ $event->start_date }} - {{ $event->end_date }}</p>
		<div class="eventInfo">
			<a href='/timelines/{{ $timeline->id }}/events/{{ $event->id }}'>{{ $event->name }}</a><br>
				{{ $event->description }}
		</div>
	@endforeach
	
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $timeline->created_by }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $timeline->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $timeline->last_modified_by }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $timeline->updated_at }}
		</div>
	</div>
@stop