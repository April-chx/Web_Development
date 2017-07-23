<?php
	error_reporting(0);
	session_start();
	include('header.php');
	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);
?>
<!-- main1 -->
	<div class="main1">
		<div class="container"></div>
	</div>
<!-- //main1 -->
<!-- results -->
	<?php
		if ($_POST['search_text'] != null){
			if($_POST['type'] == "restaurant"){
				$result1=mysql_query("SELECT * FROM Recipe WHERE RestaurantName LIKE '%$_POST[search_text]%' ORDER BY Frequency DESC");
				echo '<div class="results"><div class="container"><br><h1>'.$_POST['search_text'].'</h1><div class="result-grids">';
				while ($row1 = mysql_fetch_array($result1)){
					echo '<div class="col-md-3 result-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">';
					echo '<img src="'.$row1['Img_path'].'" alt=" " width="210px" height="160px" />';
					echo '<div class="list"><a href="dish.php?recipename='.$row1['RecipeName'].'">'.$row1['RecipeName'].'</a></div>';
					echo '<p class="des">'.substr($row1['Description'],0,150).'...</p><div class="more"><a href="dish.php?recipename='.$row1['RecipeName'].'" class="hvr-curl-bottom-right">Read More</a></div></div>';
				}
			}
			if($_POST['type'] == "dish"){
				$sql2=mysql_query("SELECT * FROM Recipe WHERE RecipeName LIKE '%$_POST[search_text]%' ORDER BY Frequency DESC");
				//$restaurantresult = mysql_fetch_array($sql);
				//$result=mysql_query("SELECT * FROM Restaurant WHERE RestaurantID='$restaurantresult[RestaurantID]'");
					echo '<div class="results"><div class="container"><br><h1>'.$_POST['search_text'].'</h1><div class="result-grids">';
					while ($row2 = mysql_fetch_array($sql2)){
						echo '<div class="col-md-3 result-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">';
						echo '<img src="'.$row2['Img_path'].'" alt=" " width="200px" height="150px" />';
						echo '<div class="list"><a href="dish.php?recipename='.$row2['RecipeName'].'">'.$row2['RecipeName'].'</a></div>';
						echo '<p class="des">Address: '.substr($row2['Description'],0,150).'...</p><div class="more"><a href="dish.php?recipename='.$row2['RecipeName'].'" class="hvr-curl-bottom-right">Read More</a></div></div>';
					}
			}
			if($_POST['type'] == "location"){
				$sql=mysql_query("SELECT * FROM Restaurant WHERE Address LIKE '%$_POST[search_text]%' ORDER BY Frequency DESC");
					echo '<div class="results"><div class="container"><br><h1>'.$_POST['search_text'].'</h1><div class="result-grids">';
					while ($restaurantresult = mysql_fetch_array($sql)){
						echo '<div class="col-md-3 result-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">';
						echo '<img src="'.$restaurantresult['Img_path'].'" alt=" " width="220px" height="170px" />';
						echo '<div class="list"><a href="restaurant.php?restaurantname='.$restaurantresult['RestaurantName'].'">'.$restaurantresult['RestaurantName'].'</a></div>';
						echo '<p class="des">Address: '.$restaurantresult['Address'].'<br><br>Tag: '.$restaurantresult['Tags'].'</br></p><div class="more"><a href="restaurant.php?restaurantname='.$restaurantresult['RestaurantName'].'" class="hvr-curl-bottom-right">Read More</a></div></div>';
					}
			}
				echo '<div class="clearfix"> </div>';
				echo '</div></div></div>';
		}else{
			//echo '<script language="JavaScript">;alert("Sorry, we do not find any result. Please try other keywords^_^"); location.href="index.php";</script>;';
			echo '<div class="results"><div class="container"><br><h1> Sorry, we do not find any result. Please try other keywords^_^</h1>'; 
			echo '<a href="index.php" style="position:relative; top:20px; font-size:20px;"> Back </a></div>';
			echo '<div class="clearfix"> </div>';
			echo '</div></div>';
		}
	?>
<!-- //results -->
<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="footer-grid">
					<p align="middle">@Foodie 2016</p>
				</div>
			</div>
		</div>
	</div>
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>