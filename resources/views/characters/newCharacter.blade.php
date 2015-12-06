@extends('layouts.timeline')

	
@section('main')
	<h3>New Character</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}/characters">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" >
			</div>
			<div class="form-group">
				<label for="race">Race</label>
				<input id="race" class="form-control" type="text" name="race" >
			</div>
			<div class="form-group">
				<label for="biography">Biography</label>
				<textarea id="biography" class="form-control" name="biography" rows="4"></textarea>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $character->name }} has been created.<h4>
	@endif	
@stop