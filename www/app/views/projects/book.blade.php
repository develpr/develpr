@extends('layouts.book')

@section('title')

Project: {{$project->title}}

@stop

@section('content')

<h1>
	{{$project->title}}
</h1>

{{$project->body}}

@stop