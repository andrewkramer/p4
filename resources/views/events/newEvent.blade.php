@extends('layouts.timeline')

	
@section('main')
	<h3>New Event</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}/events">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" >
			</div>
			<div class="form-group">
				<label for="start_date">Start Date</label>
				<input id="start_date" class="form-control" type="text" name="start_date" placeholder="yyyy/mm/dd" >
			</div>
			<div class="form-group">
				<label for="end_date">End Date</label>
				<input id="end_date" class="form-control" type="text" name="end_date" placeholder="yyyy/mm/dd" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" class="form-control" name="description" rows="4"></textarea>
			</div>
			<h5>Characters</h5>
			<div class="form-group">
				<label for="character1">Character 1</label>
				<select id="character1" class="form-control" name="character1">
					<option>Choose a Character</option>
					@foreach ($characters as $character)
						<option>{{ $character->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="character2">Character 2</label>
				<select id="character2" class="form-control" name="character2">
					<option>Choose a Character</option>
					@foreach ($characters as $character)
						<option>{{ $character->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="character3">Character 3</label>
				<select id="character3" class="form-control" name="character3">
					<option>Choose a Character</option>
					@foreach ($characters as $character)
						<option>{{ $character->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="character4">Character 4</label>
				<select id="character4" class="form-control" name="character4">
					<option>Choose a Character</option>
					@foreach ($characters as $character)
						<option>{{ $character->name }}</option>
					@endforeach
				</select>
			</div>
			<h5>Locations</h5>
			<div class="form-group">
				<label for="location1">Location 1</label>
				<select id="location1" class="form-control" name="location1">
					<option>Choose a Location</option>
					@foreach ($locations as $location)
						<option>{{ $location->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="location2">Location 2</label>
				<select id="location2" class="form-control" name="location2">
					<option>Choose a Location</option>
					@foreach ($locations as $location)
						<option>{{ $location->name }}</option>
					@endforeach
				</select>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $event->name }} has been created.<h4>
	@endif	
@stop