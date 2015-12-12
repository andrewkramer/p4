@extends('layouts.timeline')

	
@section('main')
	<h3>Edit Event: {{ $event->name }}</h3>
	@if ($showForm == 'true')
		<form class="form" method="POST" action="/timelines/{{ $timeline->id }}/events/{{ $event->id }}">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<input type="hidden" name="showForm" value="false">
			<div class="form-group">
				<label for="name">Name</label>
				<input id="name" class="form-control" type="text" name="name" value="{{ $event->name }}" >
			</div>
			<div class="form-group">
				<label for="start_date">Start Date</label>
				<input id="start_date" class="form-control" type="text" name="start_date" value="{{ $event->start_date }}" >
			</div>
			<div class="form-group">
				<label for="end_date">End Date</label>
				<input id="end_date" class="form-control" type="text" name="end_date" value="{{ $event->end_date }}" >
			</div>
			
			<p>
				Location: 
				@for ($l = 0; $l < count($event_locations); $l++)
					<input id="location_id{{ $l }}" type="hidden" name="location_id{{ $l }}" value="{{ $event_locations[$l]->id }}">
					<select id="location{{ $l }}" class="form-control" name="location{{ $l }}">
						<option>{{ $event_locations[$l]->name }}</option>
						@foreach ($locations as $location_list)
							<option>{{ $location_list->name }}</option>
						@endforeach
						<option>--Delete Location--</option>
					</select>
				@endfor
			</p>
			<div class="form-group">
				<label for="location_new">Add a Location</label>
				<select id="location_new" class="form-control" name="location_new">
					<option>Choose a Location</option>
					@foreach ($locations as $location)
						<option>{{ $location->name }}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" class="form-control" name="description" rows="4">{{ $event->description }}</textarea>
			</div>
			
			<h5>Characters:</h5>
			<ul>
				@for ($c = 0; $c < count($event_characters); $c++)
					<input id="character_id{{ $c }}" type="hidden" name="character_id{{ $c }}" value="{{ $event_characters[$c]->id }}">
					<select id="character{{ $c }}" class="form-control" name="character{{ $c }}">
						<option>{{ $event_characters[$c]->name }}</option>
						@foreach ($characters as $character_list)
							<option>{{ $character_list->name }}</option>
						@endforeach
						<option>--Delete Character--</option>
					</select>
				@endfor
			</ul>
			<div class="form-group">
				<label for="character_new">Add a Character</label>
				<select id="character_new" class="form-control" name="character_new">
					<option>Choose a Character</option>
					@foreach ($characters as $character)
						<option>{{ $character->name }}</option>
					@endforeach
				</select>
			</div>
			
			<button class="btn btn-primary">Submit</button>
		</form>
	@else
		<h4>{{ $event->name }} has been updated.<h4>
	@endif	
@stop