@extends('layouts.frontend')

@section('title')
Edit {{$project->title}}
@stop

@section('content')

<div class="row">
    <div class="columns content-card project">
        <h4 class="subheader">
            New Project
        </h4>

        {{ Form::model($project, array('method' => 'put', 'route' => array('projects.update', $project->id))) }}
        <div class="row">
            <div class="large-12 small-12 columns">
                {{Form::label('published', 'Published')}}
                {{Form::select('published', array(
                '0' => 'Not Published',
                '1' => 'Published',
                ))}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::label('title', 'Title')}}
                {{Form::text('title')}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::label('teaser', 'Teaser')}}
                {{Form::textarea('teaser')}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body')}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::label('repo', 'Repository')}}
                {{Form::text('repo')}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::submit('Save', array('class' => 'button radius'))}}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop