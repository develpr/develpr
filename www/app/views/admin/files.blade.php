@extends('layouts.frontend')

@section('title')
Edit Files
@stop

@section('content')

<div class="row">
    <div class="columns content-card posts">

        {{ Form::open(array('url' => '/files', 'files' => true)) }}
        <div class="row">
            <div class="large-12 small-12 columns">
                {{Form::label('override', 'Override')}}
                {{Form::select('override', array(
                '0' => 'Do not override',
                '1' => 'Override',
                ))}}
            </div>
            <div class="large-12 small-12 columns">
                {{ Form::file('image') }}
            </div>
            <div class="large-12 small-12 columns">
                {{ Form::submit('Save', array('class' => 'button radius')) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop
