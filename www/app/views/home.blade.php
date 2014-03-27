@extends('layouts.frontend')

@section('title')
    Kevin Mitchell | Develpr
@stop

@section('content')

<div class="row">
    <div class="columns content-card intro">
        <p>
            Hi, I'm Kevin. I'm a software engineer living Oakland California. I occasionally have something useful to say or interesting to share, and this is the place for me to do it.
        </p>
        <div class="more-card">
            <a href="/me">
                <i class="fi-link"></i>
                More Me
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns content-card project">
        <h4 class="subheader">
            A Project:
            <!--
<span class="subheader">
Something that took me more then a day to do.
</span>
-->
        </h4>
        <h3>
            Mitchell Morse Machine
        </h3>

        <blockquote>
            I built a web-connected morse code machine (key and sounder) for my parents for Christmas. I used an Arduino Yun to connect the machine to an API, which I built (using Laravel), along with a simple web application.
        </blockquote>


        <div class="video-wrapper">
            <iframe src="http://www.youtube.com/embed/XAbIfIo7n2A?wmode=transparent&amp;modestbranding=1&amp;autohide=1&amp;showinfo=0&amp;rel=0" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="">
            </iframe>
        </div>

        <div class="more-card">
            <a href="/projects">
                <i class="fi-link"></i>
                More Projects
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns content-card blog">
        <h4 class="subheader">
            Latest Blog Post:
            <!--
<span class="subheader">
Something that took me more then a day to do.
</span>
-->
        </h4>
        <h3>
            Making Morsel: Python for the Arduino Yun
        </h3>
        <p>
            I've never written Python before this project, but I've always wanted to. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
        </p>
        <div class="hide-the-code hide-for-medium-up"><i class="fi-arrows-out"></i>&nbsp;&nbsp;toggle code view&nbsp;&nbsp;<i class="fi-arrows-out"></i></div>

						<pre class="hide-for-small code-snippet">
							<code class="language-python">
def get_transmission(self):
#We're getting transmissions that have been sent to
#us, and have not yet been marked as received
self.url = self.base_url + self.base_api + "transmissions?direction=received&received=0"
self.data = ""

#generate a hmac signature for the request
signature = self.get_hmac_hash()

request = urllib2.Request(self.url)
request.add_header('Auth', str(self.id) + ':' + signature)

try:
response = urllib2.urlopen(request)
data = json.load(response)
except Exception, e:
return False

if len(data) > 0:
return data
else:
return False
                            </code>
                        </pre>
        <div class="more-card">
            <a href="/blog">
                <i class="fi-link"></i>
                Blog
            </a>
        </div>
    </div>
</div>
@stop