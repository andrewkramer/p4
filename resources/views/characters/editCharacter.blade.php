@extends('layouts.timeline')

	
@section('main')
	<h3>Edit Character: {{ $character->name }}</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}/characters/{{ $character->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" value="{{ $character->name }}" >
			</div>
			<div class="form-group">
				<label for="race">Race</label>
				<input id="race" class="form-control" type="text" name="race" value="{{ $character->race }}" >
			</div>
			<div class="form-group">
				<label for="biography">Biography</label>
				<textarea id="biography" class="form-control" name="biography" rows="4">{{ $character->biography }}</textarea>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $character->name }} has been updated.<h4>
	@endif	
@stop