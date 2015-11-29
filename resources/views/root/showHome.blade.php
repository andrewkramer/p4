@extends('layouts.master')

	
@section('main')
	<h3>Welcome to Timeline Builder</h3>
	<p>We are a free service to help you organize dates and events. Just create a timeline project and add as many events, characters, and locations as you need. The application will automatically generate an organized timeline of the information.</p>
	<p>Create as many projects as you need, or contribute to public projects. Create a new project now to get started.</p>
	<form method="POST" action="/timelines">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<input type="hidden" name="showForm" value="true">
		<button class="btn btn-primary">New Timeline</button>
	</form>
	<div class='databaseList'>
		<h4>Your Timeline Projects</h4>
		@foreach ($users_timelines as $users_timeline)
			<li><a href='/timelines/{{ $timeline->id }}'>{{ $users_timelines->name }}</a></li>
		@endforeach
		
		<h4>All Timeline Projects</h4>
		@foreach ($timelines as $timeline)
			<li><a href='/timelines/{{ $timeline->id }}'>{{ $timeline->name }}</a></li>
		@endforeach
	</div>
@stop