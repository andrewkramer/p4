@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $character->name }}</h3>
	<h4>{{ $character->race }}<h4>
	<p>{{ $character->biography }}</p>
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $character->created_by }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $character->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $character->last_modified_by }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $character->updated_at }}
		</div>
	</div>
@stop