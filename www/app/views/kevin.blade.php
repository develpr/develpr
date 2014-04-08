@extends('layouts.frontend')

@section('title')
Kevin Mitchell (Me!)
@stop

@section('content')

<div class="row">
    <div class="columns content-card">

        {{Setting::get('aboutKevin')}}

        @if(Setting::get('looking'))
        {{Setting::get('aboutKevinLooking')}}
        @endif

    </div>
</div>

@stop