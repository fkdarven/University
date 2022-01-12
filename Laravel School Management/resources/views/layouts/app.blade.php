<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'L&D') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
	
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-	">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'L&D') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto" style="color: black">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
						</li>
						@else
						<li class="nav-item dropdown" style="color: black">
							<a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="">
								<i class="far fa-envelope"><span class="badge badge-secondary">{{count(auth()->user()->unreadNotifications)}}</span></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align: center;">
								@if(count(auth()->user()->unreadNotifications)==0)
									<strong class="dropdown-item">Sem notificações</strong>
								@else
									@foreach(auth()->user()->unreadNotifications as $notification)
										@if(!(isset($notification->data['user'])))
											<strong><a style="color: black" class="dropdown-item" href="/notifications/{{$notification->id}}">{{$notification->data['data']}} {{$notification->data['course']}}</a></strong>
										@else
											<strong><a style="color: black" class="dropdown-item" href="/notifications2/{{$notification->id}}">{{$notification->data['data']}}{{$notification->data['user']}} {{$notification->data['course']}}</a></strong>
										
										@endif
									@endforeach
									<div class="dropdown-divider"></div>
									<a id= "allread" class="dropdown-item" href="/notifications">MARCAR TODAS COMO LIDAS</a>
								@endif
							</div>
						</li>
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="divlinks">
								<a class="dropdown-item" href="/enrollments"> Minhas Disciplinas </a>
								<a class="dropdown-item" href="/courses" > Disciplinas Disponíveis </a>
								@if(auth()->user()->is_admin==1)
								<a class="dropdown-item" href="/courses/allcourses">Todas as Disciplinas</a>
								<a class="dropdown-item" href="/enrollments/activate_enrollments">Autorizações Pendentes</a>
								<a class="dropdown-item" href="/enrollments/enrollment">Estudantes</a>
								@endif
								<a class="dropdown-item" href="/admins">Administradores</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>

	<main class="py-4">
		@yield('content')
	</main>
</div>
</body>
</html>

<script>
