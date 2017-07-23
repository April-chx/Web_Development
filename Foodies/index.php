<?php
	error_reporting(0);
	session_start();

	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);

	include('database.php');
	include('header.php');
?>
<!-- main -->
	<div class="main">
		<div class="container">
			<div class="main-info">
				<h1 class="animated fadeInLeftBig" >
				<div class="searchbar">
				    <ul class="nav1">
				    <form method="POST" action="searchresult.php">
				    	<li id="options">
				    	<select style="background:transparent;"  name="type">
				    		<option value="restaurant" >Restaurant</option> 
				    		<option value="dish" >Dish</option> 
				    		<option value="location">Location</option> 
				    	</select>
				    	</li>
		            	<li id="search">
							<input type="text" name="search_text" id="search_text" placeholder="Search"/>
							<input type="submit" name="search" value="" id="search_button">
						</li>
					</form>
					<a style=" color:#FAEBD7; font-size:20px; position:absolute; left:330px; top:80px;" href="guess.php"> Try me! Guess you like... </a>
	            	</ul>
	            </div>
				</h1>
				<?php
					/*if( isset($_POST['search']) )
					{
						$_SESSION['type'] = $_POST['type'];
						$_SESSION['keyword'] = $_POST['search_text'];
					}*/
				?>
				<div class="main-info1 animated wow fadeInDown" >
					<ul id="flexiselDemo1">			
						<li>
							<div class="main-info1-grid">
								<img src="images/restaurant.jpg" alt=" " class="img-responsive" />
								<h3>By Restaurant</h3>
								<p>Search the restaurant to acquire its menu and details.</p>
							</div>
						</li>
						<li>
							<div class="main-info1-grid">
								<img src="images/2.png" alt=" " class="img-responsive" />
								<h3>By Dish</h3>
								<p>Search the dish you like to obtain its cooking method.</p>
							</div>
						</li>
						<li>
							<div class="main-info1-grid">
								<img src="images/location.jpg" alt=" " class="img-responsive" />
								<h3>By Location</h3>
								<p>Search by detailed loction to find nearby restaurants.</p>
							</div>
						</li>
					</ul>
						<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 2
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
				</div>
			</div>
		</div>
	</div>
<!-- //main -->

<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>