<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title> 

 {{ Html::style('css/bootstrap.min.css') }}
 {{ Html::style('css/navbar.css') }}
 {{ Html::style('css/style.css') }} 
 {{ Html::style('css/plugins/star-rating.css') }} 
 {{ Html::style('css/plugins/theme-krajee-svg.css') }} 

 @yield('header')
 
 </head>

<body>

	@include('partials.navbar')
	
	@yield('homePagePhoto')
	
	@include('partials.flashMessage')

	@yield('content')
	
	
</body>

 	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	{{ Html::script('js/plugins/bootstrap.min.js') }} 
	{{ Html::script('js/plugins/typeahead.bundle.min.js') }}
	{{ Html::script('js/plugins/star-rating.min.js') }}
	{{ Html::script('js/plugins/jquery.dotdotdot.min.js')}}
	{{ Html::script('js/plugins/moment.js') }}
	{{ Html::script('js/plugins/jquery.infinitescroll.min.js')}}
	
	<script>
		$('div.alert').not('.alert-important').delay(2000).slideUp(300);
	</script>
	
	@yield('script')
	
	
</body>
</html>