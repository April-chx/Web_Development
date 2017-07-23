<!DOCTYPE HTML>
<html>
<head>
	<title>Welcome to Foodie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> </script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<!-- animation-effect -->
	<link href="css/animate.min.css" rel="stylesheet">
	<script src="js/wow.min.js"></script>
	<script src="js/menu_jquery.js"></script> 
	<script>
	 new WOW().init();
	</script>
<!-- //animation-effect -->
</head>

<body>
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="logo">
						<a class="navbar-brand" href="index.php">Foodies</a>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-13" id="cl-effect-13">
						<ul class="nav navbar-nav">
							<li><a href="index.php"  class="active">Home</a></li>
							<?php
								if ($_SESSION['valid_user'] == null){
									echo '<li><a href="register.php">Register</a></li>';
									echo '<li class="login"><div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a><div id="loginBox">';              
									echo '<form id="loginForm" method="post"><fieldset id="body">';
									echo '<fieldset><label for="account">Account </label><input type="text" name="account" id="account"></fieldset>';
									echo '<fieldset><label for="password">Password</label><input type="password" name="password" id="password"></fieldset>';
									echo '<input type="submit" id="login" value="Sign in" name="login">';
									echo '<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>';
									echo '</fieldset></form></div></div></li>';
								}else{
									echo '<li><a>Welcome,'.$_SESSION['valid_user'].'</a></li>';
									echo '<li><a href="register.php">Log out</a></li>';
								}
								$username = $_POST['account'];
								$password = $_POST['password'];
								
								if ($_POST['login']=="Sign in"){
									if (in_array($username, $account)){
										if(in_array($password, $passw)){
											echo '<script language="JavaScript">;alert("Sign in successfully!"); location.href="index.php";</script>';
											$_SESSION['valid_user'] = $username;
										}else
											echo '<script language="JavaScript">;alert("Wrong Password! Please try again.");</script>';
									}else{
										echo '<script language="JavaScript">;alert("Sorry, you have not registered yet."); location.href="register.php";</script>';
									}
								}
							?>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>