<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title','No Title') - Laravel Album</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	{{-- bootstrap navbar --}}
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="incon-bar"></span>
					<span class="incon-bar"></span>
					<span class="incon-bar"></span>
				</button>
				<a href="{{ route('home')}} " class="navbar-brand">Laravel Album</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav"></ul>
				
			</div>
		</div>
	</nav>
	{{-- bootstrap container --}}
	<div class="container">
		@include('shared.messages')
		@yield('content')
	</div>
	{{-- bootstrap container --}}
	<script src="/js/app.js"></script>
	@yield('script')
</body>
</html>