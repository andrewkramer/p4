<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="img/favicon.png"/>
		<title>@yield('title',"Timeline Builder")</title>

		<!-- Import Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
		
		<!-- Import Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Import sitewide custom CSS -->
		<link href="css/tb.css" rel="stylesheet">
		
		{{-- Yield page specific css --}}
		@yield('head')
	</head>
	<body>
		<div class="container-fluid">
			<header class="row">
				<div class="row">
					<div class="col-md-12">
						<h1>Timeline Builder</h1>
					</div>
				</div>
			</header>

			<div class="row">
				<aside class="col-md-2">
					{{-- Yield page controls --}}
					@yield('aside')
				</aside>
				<main class="col-md-10">
					{{-- Yield main content of page --}}
					@yield('main')
				</main>
			</div>

			<footer class="row">
				<p class="col-md-12">Copyright &copy; {{ date('Y') }} Andrew Kramer</p>
			</footer>
		</div> <!-- End Container -->
		
		<!-- Import jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Import Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		{{-- Yield page specific scripts --}}
		@yield('body')
	</body>
</html>