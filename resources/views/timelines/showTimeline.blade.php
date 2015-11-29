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