@extends('layouts.master')

	
@section('main')
	<h3>New Timeline</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" class="form-control" name="description" rows="4"></textarea>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $timeline->name }} has been created.<h4>
	@endif	
@stop