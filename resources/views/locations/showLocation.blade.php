@extends('layouts.timeline')

	
@section('main')
	<h3>{{ $location->name }}</h3>
	<p>{{ $location->description }}</p>
	<div class='row auditInfo'>
		<div class='col-md-6'>
			Created by: {{ $location->created_by }}
		</div>
		<div class='col-md-6'>
			Created on: {{ $location->created_at }}
		</div>
		<div class='col-md-6'>
			Last Updated by: {{ $location->last_modified_by }}
		</div>
		<div class='col-md-6'>
			Last Updated on: {{ $location->updated_at }}
		</div>
	</div>
@stop