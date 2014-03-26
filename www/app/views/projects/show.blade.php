@extends('layouts.frontend')

@section('title')

{{$project->title}}

@stop

@section('content')

<row>
    <div class="columns content-card project">
        <h1>
            {{$project->title}}
        </h1>

        {{$project->body}}

        <div class="more-card">
            <a href="/blog">
                <i class="fi-link"></i>
                More Projects
            </a>
        </div>
    </div>
</row>

@stop