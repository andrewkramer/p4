@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $location->name }}</h3>
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/locations/{{ $location->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">Edit Location</button>
		</form>
	@endif
	<p>{{ $location->description }}</p>
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $created_by->email }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $location->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $last_modified_by->email }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $location->updated_at }}
		</div>
	</div>
@stop