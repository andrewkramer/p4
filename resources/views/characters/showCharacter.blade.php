@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $character->name }}</h3>
	@if(count($errors) > 0)
		<h4 class="submit_error">Submit failed</h4>
		<ul class="submit_error">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	@if (Auth::check())
		<form method="POST" action="/timelines/{{ $timeline->id }}/characters/{{ $character->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="true">
			<button class="btn btn-primary">Edit Character</button>
		</form>
	@endif
	<h4>{{ $character->race }}</h4>
	<p>{{ $character->biography }}</p>
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $created_by->email }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $character->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $last_modified_by->email }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $character->updated_at }}
		</div>
	</div>
@stop