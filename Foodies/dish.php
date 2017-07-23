<?php
	error_reporting(0);
	session_start();
	include('header.php');
	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);

	function _getUrlContent($url){
		$handle = fopen($url, "r");
		if($handle){
			$content = stream_get_contents($handle,1024*1024);
			file_put_contents("1.php",$content);
			return $content;
		}else{
			return false;
		}
	}
	function _filterUrl($web_content){
		$reg_tag_a = '/watch\?v\=.?.?.?.?.?.?.?.?.?.?.?/m';
		$reg_tag_b = '/maps\/vt\/data\=.*\"/U';
		$web_content = str_replace(array("\rn", "\r", "\n"), "", $web_content);
		$result = preg_match_all($reg_tag_a,$web_content,$match_result);
		if($result){
			$match_result = array_unique($match_result[0]);
			$fh = fopen("url.txt", "a");
			$i = 0;
			foreach ($match_result as $item) {
				$i++;
				if ($i==3){
					$GLOBALS[0] = "https://www.youtube.com/embed/".substr($item, -11)."\n";
				}
				if ($i==4){
					$GLOBALS[1] = "https://www.youtube.com/embed/".substr($item, -11)."\n";
				}
				$item = "https://www.youtube.com/embed/".substr($item, -11)."\n";
				fwrite($fh, $item);
			}
			fclose($fh);
			return $match_result;
		}
	}
	function video(){
		$recipedetail = $_GET['recipename'];
		$nw=urlencode($recipedetail);
		$url_youtube = "https://www.youtube.com/results?search_query=howtocook".$nw."&num=3";
		$content1 = _getUrlContent($url_youtube);
		$array1 = _filterUrl($content1);
		echo "<br />";                         
		echo '<iframe width="720" height="380" src="'.$GLOBALS[0].'" frameborder="0" allowfullscreen></iframe>'; 
	}
?>

<!-- main1 -->
	<div class="main1">
		<div class="container">
		</div>
	</div>
<!-- //main1 -->
<!-- dish detail -->
	<div class="detail">
		<div class="container">
		<?php
			$recipedetail = $_GET['recipename'];
			$result = mysql_query("SELECT * FROM Recipe WHERE Recipename='$recipedetail'");
			echo '<div class="detail-left col-md-10"><br><h1>'.$recipedetail.'</h1>';
			echo '<div class="detail-left wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
					<p></p></div>';
			$row = mysql_fetch_array($result);
			echo '<div class="detail-left wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms"><img src="'.$row['Img_path'].'" alt=" " width="240px" height="200px" /></div>';
			//echo '<p align="left">'.$row['RestaurantName'].'</p></div>';
			$frequency = $row['Frequency'] + 1;
			$update =  mysql_query("UPDATE Recipe SET Frequency='$frequency' WHERE Recipename='$recipedetail'");

			echo '<div class="detail-left wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms"><br><h1>How To Make It</h1>';
			video();
			echo '<br></br>';
		?>
		</div>
	</div>
			<div class="detail-right">
			<?php
				$sql=mysql_query("SELECT * FROM Recipe WHERE RecipeName='$_GET[recipename]'");
				$restaurantresult = mysql_fetch_array($sql);
				$restaurant=mysql_query("SELECT * FROM Restaurant WHERE RestaurantID='$restaurantresult[RestaurantID]'");
				echo '<div class="list-group list-group-alternate"><h1>Restaurants</h1><br>';
				while ($restaurantrow = mysql_fetch_array($restaurant)){
					echo '<a href="restaurant.php?restaurantname='.$restaurantrow['RestaurantName'].'" class="list-group-item"> '.$restaurantrow['RestaurantName'].' <p> Address: '.$restaurantrow['Address'].'</p></a>';
				}
				echo '</div>';
			?>
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>
<!-- //dish detail -->
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
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>