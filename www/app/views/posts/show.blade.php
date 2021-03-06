@extends('layouts.frontend')

@section('title')

{{$post->title}}

@stop

@section('content')

@if(Auth::check())
<div class="row">
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/posts/{{$post->id}}/edit">
                <i class="fi-link"></i>
                Edit Post
            </a>
        </div>
    </div>
</div>
@endif

<div class="row h-entry">
    <div class="columns content-card post">
        <h1 class="p-name">
            <a href="{{$post->getUrl()}}" class="u-url">{{$post->title}}</a>
        </h1>
        <h4><time class="dt-published" datetime="{{$post->created_at->toDateTimeString()}}">{{ $post->created_at->format('F j, Y') }}</time></h4>

        <div class="e-content">
        {{$post->body}}
        </div>

        <div class="more-card">
            <a href="/blog">
                <i class="fi-link"></i>
                More Posts
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="comments columns content-card">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'develpr'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

    </div>
</div>

@stop