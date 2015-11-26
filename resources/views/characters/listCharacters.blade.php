@extends('layouts.timeline')

	
@section('main')
	<h3>Characters</h3>
	<form method="POST" action="/timelines/{{ $timeline->id }}/characters">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<input type="hidden" name="showForm" value="true">
		<button class="btn btn-primary">New Character</button>
	</form>
	<div class='databaseList'>
		@foreach ($characters as $character)
			<li><a href='/timelines/{{ $timeline->id }}/characters/{{ $character->id }}'>{{ $character->name }}</a></li>
		@endforeach
	</div>
@stop