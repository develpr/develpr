@extends('layouts.frontend')

@section('title')

{{$post->title}}

@stop

@section('content')

@if(Auth::check())
<div class="row">
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/posts/{{$post->id}}/edit">
                <i class="fi-link"></i>
                Edit Post
            </a>
        </div>
    </div>
</div>
@endif

<div class="row">
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
</div>

@stop