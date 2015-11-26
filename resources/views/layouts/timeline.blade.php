@extends('layouts.master')


@section('timelineName')
	{{ $timeline->name }}
@stop


@section('aside')
	<li><a href="/timelines/{{ $timeline->id }}">Timeline</a></li>
	<li><a href="/timelines/{{ $timeline->id }}/characters">Timeline Characters</a></li>
	<li><a href="/timelines/{{ $timeline->id }}/locations">Timeline Locations</a></li>
@stop