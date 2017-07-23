<?php
	error_reporting(0);
	session_start();

	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);

	include('database.php');
	include('header.php');
?>
<!-- main1 -->
	<div class="main1">
		<div class="container">
		</div>
	</div>
<!-- //main1 -->
	<div class="results">
		<div class="container"><br>
			<h1>I guess you may like ...</h1>
			<div class="clearfix"> </div>
		</div>
	</div>
<?php
	if ($_SESSION['valid_user'] == NULL){
		$sql=mysql_query("SELECT * FROM Restaurant ORDER BY Frequency DESC");
		echo '<div class="results"><div class="container"><br><h1>'.$_POST['search_text'].'</h1><div class="result-grids">';
		while ($restaurantresult = mysql_fetch_array($sql)){
				echo '<div class="col-md-3 result-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">';
				echo '<img src="'.$restaurantresult['Img_path'].'" alt=" " width="220px" height="170px" />';
				echo '<div class="list"><a href="restaurant.php?restaurantname='.$restaurantresult['RestaurantName'].'">'.$restaurantresult['RestaurantName'].'</a></div>';
				echo '<p class="des">Address: '.$restaurantresult['Address'].'<br><br>Tag: '.$restaurantresult['Tags'].'</br></p><div class="more"><a href="restaurant.php?restaurantname='.$restaurantresult['RestaurantName'].'" class="hvr-curl-bottom-right">Read More</a></div></div>';
			}
	}else{
		echo '<div class="results"><div class="container"><br><h1>'.$_POST['search_text'].'</h1><div class="result-grids">';
		include('recommendation.php');
		for($z=0;$z<5;$z++){
      		$notRatePosi = array_keys($recArray,$top5[$z],true);
      		$posi1 = $notRatePosi[0];
      		//echo $notRate[$posi1]."\t";
      		$recommend = mysql_query("SELECT * FROM Restaurant WHERE RestaurantID='$notRate[$posi1]'", $link);
      		$recommendrow = mysql_fetch_array($recommend);
      		echo '<div class="col-md-3 result-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">';
				echo '<img src="'.$recommendrow['Img_path'].'" alt=" " width="220px" height="170px" />';
				echo '<div class="list"><a href="restaurant.php?restaurantname='.$recommendrow['RestaurantName'].'">'.$recommendrow['RestaurantName'].'</a></div>';
				echo '<p class="des">Address: '.$recommendrow['Address'].'<br><br>Tag: '.$recommendrow['Tags'].'</br></p><div class="more"><a href="restaurant.php?restaurantname='.$recommendrow['RestaurantName'].'" class="hvr-curl-bottom-right">Read More</a></div></div>';
    	}
	}
?>