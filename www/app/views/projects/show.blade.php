@extends('layouts.frontend')

@section('title')

{{$project->title}}

@stop

@section('content')

@if(Auth::check())
<div class="row">
    <div class="columns content-card create">
        <div class="more-card">
            <a href="/projects/{{$project->id}}/edit">
                <i class="fi-link"></i>
                Edit Project
            </a>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="columns content-card project">
        <h1>
            {{$project->title}}
        </h1>

        {{$project->body}}

        <div class="more-card">
            <a href="/projects">
                <i class="fi-link"></i>
                More Projects
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="columns comment content-card">
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