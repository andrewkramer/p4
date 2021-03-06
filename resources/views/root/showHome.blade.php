@extends('layouts.master')

	
@section('main')
	<h3>Welcome to Timeline Builder</h3>
	<p>We are a free service to help you organize dates and events. Just create a timeline project and add as many events, characters, and locations as you need. The application will automatically generate an organized timeline of the information.</p>
	<p>Create as many projects as you need, or contribute to public projects. Create an account and create a new project now to get started.</p>
	
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">New Timeline</button>
		</form>
	@endif
	<div class='databaseList'>
		@if (Auth::check())
			<h4>Your Timeline Projects</h4>
			<ul>
			@foreach ($users_timelines as $users_timeline)
				<li><a href='/timelines/{{ $users_timeline->id }}'>{{ $users_timeline->name }}</a></li>
			@endforeach
			</ul>
		@endif
		
		<h4>All Timeline Projects</h4>
		<ul>
		@foreach ($timelines as $timeline)
			<li><a href='/timelines/{{ $timeline->id }}'>{{ $timeline->name }}</a></li>
		@endforeach
		</ul>
	</div>
@stop