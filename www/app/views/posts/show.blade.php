@extends('layouts.frontend')

@section('title')

{{$post->title}}

@stop

@section('content')

@if(Auth::check())
<row>
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/posts/{{$post->id}}/edit">
                <i class="fi-link"></i>
                Edit Post
            </a>
        </div>
    </div>
</row>
@endif

<row>
    <div class="columns content-card post">
        <h1>
            {{$post->title}}
        </h1>

        {{$post->body}}

        <div class="more-card">
            <a href="/blog">
                <i class="fi-link"></i>
                More Posts
            </a>
        </div>
    </div>
</row>

@stop