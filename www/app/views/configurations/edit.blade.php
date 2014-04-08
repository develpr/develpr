@extends('layouts.frontend')

@section('title')
Edit Configurations
@stop

@section('content')

<div class="row">
    <div class="columns content-card project">
        <h4 class="subheader">
            Configurations
        </h4>

        {{ Form::open(array('url' => '/configurations', 'method' => 'put')) }}
        <div class="row">
            @foreach($configurations as $configuration)
            <div class="large-12 small-12 columns">
                {{Form::label($configuration->key, Str::title($configuration->key))}}
                @if(strlen($configuration->value) > 30)
                {{Form::textarea($configuration->key, $configuration->value)}}
                @else
                {{Form::text($configuration->key, $configuration->value)}}
                @endif
            </div>
            @endforeach
            <div class="large-12 small-12 columns">
                {{Form::submit('Save', array('class' => 'button radius'))}}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<div class="row">
    <div class="columns content-card">
        <div>
            <input name="key" type="text" id="key" />
            <a class="button radius" href="/configurations/create" id="addConfiguration">Create New Configuration</a>
        </div>
    </div>
</div>

@stop