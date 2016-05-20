<?php
	include("sessionmanagement.php");

	session_start();
?>
<!doctype html>
<html>
<head>
	<title>IRQ Bank Marketplace</title>
	<meta name="viewport" content="initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/core.css">
	<script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/core.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" onclick="return false" class="navbar-brand"><span class="text-primary">IRQ Bank Marketplace</span></a>
		</div>
		<div id="navbarCollapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li<?php if ($_SERVER['REQUEST_URI'] == "/market/home/") echo ' class="active"'; ?>><a href="/market/home/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li<?php if ($_SERVER['REQUEST_URI'] == "/market/view/") echo ' class="active"'; ?>><a href="/market/view/"><span class="glyphicon glyphicon-search"></span> Find sellers</a></li>
				<li><a href="#" onclick="alert('Not implemented')"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
<?php
	if (sessionActive())
	{
?>
				<li<?php if ($_SERVER['REQUEST_URI'] == "/market/view/?user=" . $_SESSION["username"]) echo ' class="active"'; ?>><a href="/market/view/?user=<?php echo htmlentities($_SESSION["username"], ENT_QUOTES | ENT_HTML5); ?>"><span class="glyphicon glyphicon-user"></span> <?php echo htmlentities($_SESSION["username"], ENT_QUOTES | ENT_HTML5); ?></a></li>
				<li><a href="/market/logout/"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
<?php
	}
	else
	{
?>
				<li<?php if ($_SERVER['REQUEST_URI'] == "/market/create/") echo ' class="active"'; ?>><a href="/market/create/"><span class="glyphicon glyphicon-user"></span> Create account</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							<div class="row">
								<div class="col-md-12">
									Login via
									<div class="social-buttons">
										<a href="#" onclick="alert('Not implemented')" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
										<a href="#" onclick="alert('Not implemented')" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
									</div>
									or
								 	<form method="POST" action="/market/login/">
										<div class="form-group">
											 <label class="sr-only" for="loginusername">Username</label>
											 <input required type="text" class="form-control" id="loginusername" name="loginusername" placeholder="Username">
										</div>
										<div class="form-group">
											<label class="sr-only" for="loginpassword">Password</label>
											<input required type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password">
											<div class="help-block text-right"><a href="" onclick="alert('Not implemented')">Forgot password?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</li>
					</ul>
				</li>
<?php
	}
?>
			</ul>
		</div>
	</div>
</nav>
