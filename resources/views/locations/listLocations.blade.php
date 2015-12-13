@extends('layouts.timeline')

	
@section('main')
	<h3>Locations</h3>
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/locations">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">New Location</button>
		</form>
	@endif
	<div class='databaseList'>
		<ul>
		@foreach ($locations as $location)
			<li><a href='/timelines/{{ $timeline->id }}/locations/{{ $location->id }}'>{{ $location->name }}</a></li>
		@endforeach
		</ul>
	</div>
@stop