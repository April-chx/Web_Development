<?php
	error_reporting(0);
	session_start();

	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);
	include('database.php');
?>

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
							<li><a href="index.php" >Home</a></li>
							<?php
								unset($_SESSION['valid_user']);
								if ($_SESSION['valid_user'] == null){
									echo '<li><a href="register.php" class="active">Register</a></li>';
									echo '<li class="login"><div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a><div id="loginBox">';              
									echo '<form id="loginForm" method="post"><fieldset id="body">';
									echo '<fieldset><label for="account">Account </label><input type="text" name="account" id="account"></fieldset>';
									echo '<fieldset><label for="password">Password</label><input type="password" name="password" id="password"></fieldset>';
									echo '<input type="submit" id="login" value="Sign in" name="login">';
									echo '<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>';
									echo '</fieldset></form></div></div></li>';
								}else{
									echo '<li><a>Welcome,'.$_SESSION['valid_user'].'</a></li>';
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
										unset($_SESSION['username']);
										unset($_SESSION['valid_user']);
									}
								}
							?>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
	<div class="main1">
		<div class="container">
		</div>
	</div>
	<div class="register">
		<div class="container">
		   <form method="post"> 
				 <div class="register-top-grid">
				 	<h1>LOGIN INFORMATION</h1>
					    <div>
							<span>Account Name<label>*</label></span><input type="text" name="account">
						</div>
						<div>								
						 	<span>Password<label>*</label></span><input type="password" name="password">
						</div>
						<div>
							<span>Confirm Password<label>*</label></span><input type="password" name="confirmpass">
						 </div>
						 <div class="clearfix"> </div>
						 <a class="block"></a>
				</div>
				<div class="register-bottom-grid">
					<h4>PERSONAL INFORMATION</h4>
						<div>
							<span>First Name</span><input type="text" name="firstname"> 
					 	</div>
					 	<div>
							<span>Last Name</span><input type="text" name="lastname"> 
						 </div>
						 <div>
							 <span>Email Address<label>*</label></span><input type="text" name="email"> 
						 </div>
					 <div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" value="submit" name="submit">
					   <div class="clearfix"> </div>
				</div>
				</form>
				<?php
					$username = $_POST['account'];
					$password = $_POST['password'];
					$passwordcheck = $_POST['confirmpass'];
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$email = $_POST['email'];

					if($_POST['submit']=="submit" )
					{
						if ($username != NULL && $password != NULL){
							if ($password == $passwordcheck){
							$id=count($userid)+1;
							$sql="INSERT INTO User (UserID, Account, Password, Firstname, Lastname, Email)
								VALUES ('$id','$username','$password','$firstname','$lastname','$email')";
							mysql_query($sql,$link);

							echo '<script language="JavaScript">;alert("Congratulations! You are one of Foodies now!");
								location.href="index.php";</script>;';
							$_SESSION['valid_user'] = $username;
							}
							else{
							echo '<script language="JavaScript">;alert("Notice:DIFFERENT PASSWORD!");
								location.href="register.php";</script>;';
							}
						}
						else echo '<script>;alert("Notice:Please enter the compete infomation!");</script>;';
					}
				?>
		   </div>
	</div>
	<?php

	?>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="footer-grid">
					<p align="middle">@Foodie 2016</p>
				</div>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>		