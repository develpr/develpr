<nav class="large-menu">
	<ul>
		<li>
			<a href="/projects">
				<i class="fi-link">
				</i>
				Projects
			</a>
		</li>
		<li>
			<a href="/blog">
				<i class="fi-link">
				</i>
				Blog
			</a>
		</li>
		<li>
			<a href="http://www.github.com/develpr" target="_blank">
				<i class="fi-social-github"></i>
				Github
			</a>
		</li>

		<li>
			<a href="/kevin-mitchell-resume">
				<i class="fi-link">
				</i>
				Resume
			</a>
		</li>

		<li>
			<a href="/contact">
				<i class="fi-mail">
				</i>
				Contact
			</a>
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