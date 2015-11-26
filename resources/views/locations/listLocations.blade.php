@extends('layouts.timeline')

	
@section('main')
	<h3>Locations</h3>
	<form method="POST" action="/timelines/{{ $timeline->id }}/locations">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<input type="hidden" name="showForm" value="true">
		<button class="btn btn-primary">New Location</button>
	</form>
	<div class='databaseList'>
		@foreach ($locations as $location)
			<li><a href='/timelines/{{ $timeline->id }}/locations/{{ $location->id }}'>{{ $location->name }}</a></li>
		@endforeach
	</div>
@stop