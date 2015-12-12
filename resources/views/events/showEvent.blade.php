@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $event->name }}</h3>
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/events/{{ $event->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">Edit Event</button>
		</form>
	@endif
	<h4>{{ $event->start_date }} - {{ $event->end_date }}</h4>
	<p>
		Location: 
		@foreach ($event_locations as $location)
			<a href='/timelines/{{ $timeline->id }}/locations/{{ $location->id }}'>{{ $location->name }}</a>
		@endforeach
	</p>
	<p>{{ $event->description }}</p>
	
	<h5>Characters:</h5>
	<ul>
		@foreach ($event_characters as $character)
			<li><a href='/timelines/{{ $timeline->id }}/characters/{{ $character->id }}'>{{ $character->name }}</a></li>
		@endforeach
	</ul>
	
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $created_by->email }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $event->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $last_modified_by->email }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $event->updated_at }}
		</div>
	</div>
@stop