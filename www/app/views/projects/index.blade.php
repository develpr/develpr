@extends('layouts.frontend')

@section('title')
Projects
@stop

@section('content')

@if(Auth::check())
<div class="row">
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/projects/create">
                <i class="fi-link"></i>
                Create New Project
            </a>
        </div>
    </div>
</div>
@endif

@foreach($projects as $project)
    <div class="row">
    <div class="columns content-card project <?php echo $project->published ? "" : "unpublished" ?>">
        <h4 class="subheader">
            A Project
        </h4>
        <h3>
            {{$project->title}}
        </h3>

        {{$project->teaser}}

        <div class="more-card">
            <a href="/projects/{{$project->slug}}">
                <i class="fi-link"></i>
                Read More
            </a>
        </div>
    </div>
</div>

@endforeach

<div class="row">
    <div class="columns">
        <?php echo $projects->links(); ?>
    </div>
</div>

@stop