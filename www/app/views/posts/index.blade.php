@extends('layouts.frontend')

@section('title')
Blog
@stop

@section('content')

@foreach($posts as $post)
<row>
	<div class="columns content-card post">
		<h4 class="subheader">
			Blog
		</h4>
		<h3>
			{{$post->title}}
		</h3>

		{{$post->teaser}}

		<div class="more-card">
			<a href="/blog/{{$post->slug}}">
				<i class="fi-link"></i>
				Read More
			</a>
		</div>
	</div>
</row>

@endforeach

<?php echo $posts->links(); ?>

@stop