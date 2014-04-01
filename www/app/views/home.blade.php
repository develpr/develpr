@extends('layouts.frontend')

@section('title')
    A Laravel and Magento Guy Lives Here
@stop

@section('content')

<div class="row">
    <div class="columns content-card intro">
        <p>
            {{Setting::get('intro')}}
        </p>
        <div class="more-card">
            <a href="/me">
                <i class="fi-link"></i>
                More Me
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns content-card project">
        <h4 class="subheader">
            A Project:
            <!--
<span class="subheader">
Something that took me more then a day to do.
</span>
-->
        </h4>
        <h3>
            {{$project->title}}
        </h3>

        {{$project->teaser}}

        <div class="more-card">
            <a href="/projects">
                <i class="fi-link"></i>
                More Projects
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns content-card blog">
        <h4 class="subheader">
            Latest Blog Post:
            <!--
<span class="subheader">
Something that took me more then a day to do.
</span>
-->
        </h4>
        <h3>
            {{$post->title}}
        </h3>

        {{$post->teaser}}

        <div class="more-card">
            <a href="/blog">
                <i class="fi-link"></i>
                Blog
            </a>
        </div>
    </div>
</div>
@stop