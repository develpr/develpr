<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') | Kevin Mitchell - Develpr</title>

    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <!--[if lt IE 9]>
    <script src="bower_components/modernizr/modernizr.js"></script>
    <![endif]-->
</head>
<body>
<div class="off-canvas-wrap">
<div class="inner-wrap">
<nav class="tab-bar hide-for-large-up">
    <section class="right-small">
        <a class="right-off-canvas-toggle menu-icon">
		<span>
		</span>
        </a>
    </section>
</nav>
<aside class="right-off-canvas-menu">
    <ul class="off-canvas-list">
    </ul>
</aside>
<section class="main-section">
<div class="row i-will-be-down-there-a-bit">
    <div class="large-5 medium-5 small-12 columns">
        <div class="row">
            <div class="large-4 medium-4 small-12 columns">
                <div id="me-here">
                </div>
            </div>
            <div class="large-8 medium-8 small-12 columns">
                <div class="title"><a href="/">devel<span>o</span>p<span>e</span>r</a></div>
            </div>
        </div>
    </div>
    <div class="large-7 medium-7 show-for-large-up columns" style="padding-right:0;">
        <nav class="large-menu">
            <ul>
                <li>
                    <a href="/projects">
                        <i class="fi-link">
                        </i>
                        Projects </a>
                </li>
                <li>
                    <a href="/blog">
                        <i class="fi-link">
                        </i>
                        Blog </a>
                </li>
                <li>
                    <a href="http://www.github.com/develpr" target="_blank">
                        <i class="fi-social-github"></i>
                        Github </a>
                </li>
                <!--
    <li>
    <a href="/kevin-mitchell-resume">
    <i class="fi-link">
    </i>
    Resume
    </a>
    </li>
    -->
                <li>
                    <a href="/contact">
                        <i class="fi-mail">
                        </i>
                        Contact </a>
                </li>
                <li>
                    @if(Auth::check())
                    <a href="/logout">
                        <i class="fi-unlock"></i>
                        <span class="show-for-small-down">Logout</span>
                    </a>
                    @else
                    <a href="/login">
                        <i class="fi-lock"></i>
                        <span class="show-for-small-down">Login</span>
                    </a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="row content-cards">
    <div class="columns large-9 small-12 create-right-buffer">
        @yield('content')
    </div>
    <div class="columns large-3 small-12">
        <div class="row">
            <div class="columns content-card">
                <div id="hcard-Kevin-A-Mitchell" class="vcard row">
                    <div class="columns large-12 medium-6 small-12">
                        <img src="{{Setting::get('photo')}}" alt="photo of Kevin" class="photo"/>
								<span class="fn n">
                                    <h1>
                                        <span class="given-name">
                                            Kevin
                                        </span>
                                        <span class="family-name">
                                            Mitchell
                                        </span>
                                    </h1>
								</span>
                    </div>
                    <div class="columns large-12 medium-6 small-12">
                        <a class="email" href="mailto:kevin@develpr.com">
                            kevin@develpr.com </a>
                        <div class="adr">
									<span class="locality">Oakland</span>,

									<span class="region">CA</span>,
									<span class="postal-code">
										94612
									</span>
									<span class="country-name">
										USA
									</span>
                        </div>
                        <div class="tel">
                            +1.616.401.2066
                        </div>
                    </div>
                    <div class="columns large-12">
                        <div class="more-card">
                            <a href="/kevin">
                                <i class="fi-link"></i>
                                More Me
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hide github-card">
            <div class="columns content-card">
                <div class="row">
                    <div class="columns large-12 small-12 medium-6">
                        <div class="gears">
                            <i class="fi-widget rotating big-gear"></i>
                            <!--<i class="fi-widget rotating hide medium-gear"></i>-->
                            <i class="fi-widget rotating-counter small-gear"></i>
                        </div>
                        <h3 class="subheader" style="width:70%; float:left;">
                            I write code
                        </h3>
                    </div>
                    <div class="columns large-12 small-12 medium-6">
                        <ul class="github-stats">
                            <li class="repositories">
                                <span>Number of repositories</span>
                                <a href="#">16</a>
                            </li>
                            <li class="commitDate">
                                <span>Last pushed at</span>
                                <a href="#">16</a>
                            </li>
                            <li class="commitMessage">
                                <span>Latest commit message</span>
                                <a href="#"><pre></pre></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="columns large-12">
                        <div class="more-card">
                            <a href="#">
                                <i class="fi-social-github rotating"></i>
                                Github
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END RIGHT SIDE BAR -->
</div><!-- END MAIN CONTENT -->
<div class="row footer">
    <div class="columns large-12">
        <ul>
            <li>
                <img class="alarm" src="/img/alarm.png" alt="alarm" />
            </li>
        </ul>
    </div>
</div>
</section>
<!-- DON'T GO DOWN THERE IT'S REALLY DANGEROUS!!! -->
<a class="exit-off-canvas">
</a>
</div>
</div>
<script>
    var amLooking = <?php echo Setting::get('looking') ? 'true' : 'false'?>;
</script>
<script src="/js/build/app.min.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-10817444-15', 'develpr.com');
    ga('send', 'pageview');
</script>
</body>
</html>
<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
