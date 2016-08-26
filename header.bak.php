<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tanyao Project</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--custom css-->
	<link href="css/stickyfooter.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header col-sm-3 col-lg-2">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">tanyao Project</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav col-sm-5 col-md-7 col-lg-8">
					<li class="active"><a href="/">Home</a></li>
					<li><a href="/about.php">About</a></li>
					<li><a href="/contact.php">Contact</a></li>
				</ul>
				<button onclick="location.href='/login.php'" class="btn btn-primary navbar-btn col-sm-2 col-md-1">Log in</button>
				<button onclick="location.href='/register.php'" class="btn btn-info navbar-btn col-sm-2 col-md-1">Register</button>
			</div>
		</div>
	</nav>
	<div class="col-md-offset3">