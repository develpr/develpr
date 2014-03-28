@extends('layouts.frontend')

@section('title')
Blog
@stop

@section('content')

@if(Auth::check())
<row>
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/posts/create">
                <i class="fi-link"></i>
                Create New Post
            </a>
        </div>
    </div>
</row>
@endif

@foreach($posts as $post)
<row>
	<div class="columns content-card post <?php echo $post->published ? "" : "unpublished" ?>">
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
<row>
    <div class="columns">
        <?php echo $posts->links(); ?>
    </div>
</row>

@stop