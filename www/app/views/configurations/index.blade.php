@extends('layouts.frontend')

@section('title')
Edit Configurations
@stop

@section('content')

<div class="row">
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/configurations/create">
                <i class="fi-link"></i>
                Create New Configuration
            </a>
            <input name="key" />
        </div>
    </div>
</div>

<div class="row">
	<div class="columns content-card project">
		<h4 class="subheader">
			Configurations
		</h4>

		{{ Form::open(array('url' => '/configurations')) }}
		<div class="row">
			@foreach($configurations as $configuration)
			<div class="large-12 small-12 columns">
				{{Form::label($configuration->key, Str::title($configuration->key))}}
				{{Form::text($configuration->key, $configuration->value)}}
			</div>
			@endforeach
			<div class="large-12 small-12 columns">
				{{Form::submit('Save', array('class' => 'button radius'))}}
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>

@stop