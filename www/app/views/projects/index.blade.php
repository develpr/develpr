@extends('layouts.frontend')

@section('title')
Projects
@stop

@section('content')

	@foreach($projects as $project)
	<row>
		<div class="columns content-card project">
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
	</row>

	@endforeach

<?php echo $projects->links(); ?>

@stop