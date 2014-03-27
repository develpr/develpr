@extends('layouts.frontend')

@section('title')

{{$project->title}}

@stop

@section('content')

@if(Auth::check())
<row>
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/projects/{{$project->id}}/edit">
                <i class="fi-link"></i>
                Edit Project
            </a>
        </div>
    </div>
</row>
@endif

<row>
    <div class="columns content-card project">
        <h1>
            {{$project->title}}
        </h1>

        {{$project->body}}

        <div class="more-card">
            <a href="/projects">
                <i class="fi-link"></i>
                More Projects
            </a>
        </div>
    </div>
</row>

@stop