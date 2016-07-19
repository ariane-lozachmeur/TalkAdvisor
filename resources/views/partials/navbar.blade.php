@if ($page == 'home')

<nav class="navbar navbar-home navbar-fixed-top" id="navbar">
	<div class="container-fluid no-max-width">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../laravel5/public/">TalkAdvisor</a>
		</div>

		<div class="collapse navbar-collapse navbar-right"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="auth/login">Login</a></li>
				<li><a href="auth/register">Register</a></li>

			</ul>
		</div>

	</div>
</nav>

@else

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../laravel5/public/">TalkAdvisor</a>
		</div>

		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="../laravel5/public/">Home</a></li>
			</ul>

			<form class="navbar-form navbar-right" role="search">
				<div class="form-group" id="the-basics">
					<input type="text" class="form-control-perso typeahead"
						placeholder="Search for a speaker">
				</div>
				<button type="submit" class="button-perso"
					style="border: 0; background: transparent">
					<img src="http://localhost/laravel5/public/images/loupe.png"
						width="25" height="25" alt="submit" />
				</button>
			</form>

		</div>

	</div>
</nav>

@endif