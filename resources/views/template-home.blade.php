<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title> {{ Html::style('css/bootstrap.css') }}
 {{ Html::style('css/mycss/navbar.css') }}
 {{ Html::style('css/mycss/style.css') }} 
 {{ Html::style('css/star-rating.css') }} 
 {{ Html::style('css/theme-krajee-svg.css') }} 
 {{ Html::style('css/slider.css') }} 
 
	@yield('header')
	 
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
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
			
			 <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="../laravel5/public//">Accueil <span class="sr-only">(current)</span></a></li>
					<li><a href="speakerProfile/110">Top Speakers</a></li>
					<li><a href="#">Profile</a></li>
				</ul>	
		</div>
		
		</div>
	</nav>

	@yield('content')

	{{ Html::script('js/jquery.min.js') }}
 	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	{{ Html::script('js/bootstrap.js') }} 
	{{ Html::script('js/typeahead.bundle.min.js') }}
	{{ Html::script('js/star-rating.min.js') }}
	{{ Html::script('js/autocompletion.js') }} 
	{{Html::script('js/jquery.dotdotdot.min.js') }}
	
	@yield('script')
	
</body>
</html>