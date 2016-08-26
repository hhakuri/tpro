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
				<ul class="nav navbar-nav col-sm-6 col-md-6 col-lg-7">
					<li class="active"><a href="/">Home</a></li>
					<li><a href="/about.php">About</a></li>
					<li><a href="/contact.php">Contact</a></li>
					<li><a href="/comment_test.php">DB bio test</a></li>
					<li><a href="/mypage.php">mypage</a></li>
				</ul>
				<ul class="nav navbar-nav col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-default navbar-btn" type="button" aria-expanded="false" onclick="location.href='/register.php'">Register</button>
					<link href="/font-awesome.min.css" rel="stylesheet">
					<button class="btn btn-default dropdown-toggle btn btn-primary navbar-btn" type="button" data-toggle="dropdown" aria-expanded="false">Login</button>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							<div class="row">
								<div class="col-md-12">
									Login via
									<div class="social-buttons">
										<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
										<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
									</div>
									or
									<form class="form" role="form" method="post" action="session.php" id="login-nav">
										<div class="form-group">
											<input type="text" name="email" class="form-control" id="email" placeholder="Email address">
										</div>
										<div class="form-group">
											<input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
											<div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> keep me logged-in
											</label>
										</div>
									</form>
								</div>
								<div class="bottom text-center">
									 <a href="register.php"><b>新規登録</b></a>
								</div>
							</div>
						</li>
					</ul>
				</ul>
				</ul>
			</div>
		</div>
	</nav>
	<div>