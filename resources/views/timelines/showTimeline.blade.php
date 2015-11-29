@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $timeline->name }}</h3>
	<p>{{ $timeline->description }}</p>
	
	<h4>Events:</h4>
	<ul>
		@foreach ($timeline_events as $character)
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