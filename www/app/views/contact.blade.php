@extends('layouts.frontend')

@section('title')
Contact
@stop

@section('content')

<div class="row">
	<div class="columns content-card">
        @if(Session::has('success'))
        <h5 class="alert-box success">
            {{ Session::get('success') }}
        </h5>
        @endif
		<h1>
			Get in touch.
		</h1>
		<p>
			The easiest and most reliable way to get in touch with me is through <a class="strong" style="color:#208AE9" href="mailto:kevin@develpr.com"><strong>email</strong></a>.
		</p>
		<p>
			If for some reason you'd rather fill out a form, well, that's possible to:
		</p>
		{{ Form::open(array('url' => '/contact')) }}
		<div class="row">
			<div class="large-12 small-12 columns">
				{{Form::label("name", "Name")}}
				{{Form::text("name")}}
			</div>
			<div class="large-12 small-12 columns">
				{{Form::label("email", "Email")}}
				{{Form::text("email")}}
			</div>
			<div class="large-12 small-12 columns">
				{{Form::label("message", 'How can I help?')}}
				{{Form::textarea('message')}}
			</div>
			<div class="large-12 small-12 columns">
				{{Form::label("verify", 'Check if you are human')}}
				{{Form::checkbox('verify', 'value')}}
			</div>
			<div class="large-12 small-12 columns hide">
				{{Form::label("human", "Don't check this")}}
				{{Form::checkbox('human', 'value')}}
			</div>
			<div class="large-12 small-12 columns">
				{{Form::submit('Save', array('class' => 'button radius'))}}
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>

@stop