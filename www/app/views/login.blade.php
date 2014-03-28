@extends('layouts.frontend')

@section('title')
Projects
@stop

@section('content')

<div class="row">
    <div class="columns content-card project">
        <h4 class="subheader">
            Login
        </h4>

        {{ Form::open(array('url' => '/login')) }}
        <div class="row">
            <div class="large-6 small-12 columns">
                {{Form::label('email', 'Email')}}
                {{Form::text('email')}}
            </div>
            <div class="large-6 small-12 columns">
                {{Form::label('password', 'Password')}}
                {{Form::password('password')}}
            </div>
            <div class="large-12 small-12 columns">
                {{Form::submit('Login', array('class' => 'button radius'))}}
            </div>
        </div>
        {{ Form::close() }}

    </div>
</div>
@stop