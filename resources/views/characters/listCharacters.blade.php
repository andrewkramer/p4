@extends('layouts.timeline')

	
@section('main')
	<h3>Characters</h3>
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/characters">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">New Character</button>
		</form>
	@endif
	<div class='databaseList'>
		@foreach ($characters as $character)
			<li><a href='/timelines/{{ $timeline->id }}/characters/{{ $character->id }}'>{{ $character->name }}</a></li>
		@endforeach
	</div>
@stop