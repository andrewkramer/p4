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
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">Edit Timeline</button>
		</form>
	@endif
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
			Created by: {{ $created_by->email }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $timeline->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $last_modified_by->email }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $timeline->updated_at }}
		</div>
	</div>
@stop