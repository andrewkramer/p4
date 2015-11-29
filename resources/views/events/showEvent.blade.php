@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $event->name }}</h3>
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
			Created by: {{ $event->created_by }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $event->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $event->last_modified_by }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $event->updated_at }}
		</div>
	</div>
@stop