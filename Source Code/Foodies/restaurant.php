<?php
	error_reporting(0);
	session_start();
	//include('databse.php');
	include('header.php');
	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);

	function _filterUrl1($web_content){
	    $reg_tag_a = '/watch\?v\=.?.?.?.?.?.?.?.?.?.?.?/m';
	    $reg_tag_b = '/maps\/vt\/data\=.*\"/U';
	    $web_content = str_replace(array("\rn", "\r", "\n"), "", $web_content);
	    $result = preg_match_all($reg_tag_b,$web_content,$match_result);
	    if($result){
	        $match_result = array_unique($match_result[0]);
	        $match_result ="https://www.google.com.au/".$match_result[0];
	        return $match_result;
	    }else{
	        echo "false";
	    }
	}
	function map(){
		$input1 = $_GET['restaurantname'];
		$nw1=urlencode($input1);
		$url_google = "www.google.com/search?q=".$nw1."&num=10";
		$ch = curl_init ("");
		curl_setopt ($ch, CURLOPT_URL, $url_google);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		$output = curl_exec ($ch);
		curl_close($ch);
		$GLOBALS[2] = _filterUrl1($output);
		$GLOBALS[2] = substr($GLOBALS[2],0,strlen($GLOBALS[2])-1);
		echo "<br />"; 
		echo'<img width="580px" src="'.$GLOBALS[2].'"></img>'; 
	}

		function _getUrlContent($url){
		    $handle = fopen($url, "r");
		    if($handle){
		        $content = stream_get_contents($handle,4096*4096);
		        #print $content;
		        file_put_contents("1.php",$content);
		        return $content;
		    }else{
		        return false;
		    }
		}
		function _filterUrl2($web_content,$input){
		    $strback1 = strstr($input,"-");
		    $subsresult1 = substr($input,0,strlen($input)-strlen($strback1)+1);
		    $reg_tag_g = '/http.?\:\/\/www\.tripadvisor\.(com).*\&/U';
		    $web_content = str_replace(array("\rn", "\r", "\n"), "", $web_content);
		    $result = preg_match_all($reg_tag_g,$web_content,$match_result);
		    if($result){
		        $match_result = $match_result[0];
		        foreach($match_result as $item){
		            $strback = strstr($item,"&");
		            $subsresult = substr($item,0,strlen($item)-strlen($strback)+1);
		            $strback2 = strstr($subsresult,"%");
		            $subsresult2 = substr($subsresult,0,strlen($subsresult)-strlen($strback2)+1);
		            return $subsresult;
		        }
		    }else{
		        echo "false";
		    }
		}
		function _filterUrl3($web_content){
		    $reg_tag_b = '/partial\_entry\"\>.*\</U';
		    $reg_tag_c = '/user\_name\_name\_click\'\)\"\>.*\</U';
		    $web_content = str_replace(array("\rn", "\r", "\n"), "", $web_content);
		    $result1 = preg_match_all($reg_tag_b,$web_content,$match_result1);
		    $result2 = preg_match_all($reg_tag_c,$web_content,$match_result2);
		    if($result2){
		        $i = 0;
		        $j = 0;
		        $match_result2 = $match_result2[0];
		        $match_result1 = $match_result1[0];
		        foreach ($match_result1 as $item) {
		            $item = substr($item, 15,strlen($item)-2);
		            $i++;
		            if ($i==1){
		                $GLOBALS[4] = substr($item, 0,strlen($item)-1);
		            }
		            if ($i==2){
		                $GLOBALS[6] = substr($item, 0,strlen($item)-1);
		            }
		            if ($i==3){
		                $GLOBALS[8] = substr($item, 0,strlen($item)-1);
		            }
				}
		         foreach ($match_result2 as $item2) {
		            $item2 = substr($item2, 24,strlen($item2)-2);
		            $j++;
		            if ($j==1){
		                $GLOBALS[3] = substr($item2, 0,strlen($item2)-1);
		            }
		            if ($j==2){
		                $GLOBALS[5] = substr($item2, 0,strlen($item2)-1);
		            }
		            if ($j==3){
		                $GLOBALS[7] = substr($item2, 0,strlen($item2)-1);
		            }
				}
			        $a = $match_result2;
			        $b = $match_result1;
			        $c = array_combine($a, $b);
			        return $c;
			}else{
			    echo "false";
			}
		}

		function main(){
			$input = $_GET['restaurantname'];
			$input = strtolower($input);
			$input = str_replace(" ","-",$input)."-tripadvisor";
			$arr = explode('-',$input);
			$search = "www.google.com/search?q=".$input."&num=50";
			$ch = curl_init ("");
			curl_setopt ($ch, CURLOPT_URL, $search);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			$output1 = curl_exec ($ch);
			curl_close($ch);
			$url = _filterUrl2($output1,$arr[0]);
			$url = substr($url,0,strlen($url)-1);
			$output =  _getUrlContent($url);
			$resultsrc = _filterUrl3($output);
		}
?>
<!-- main1 -->
	<div class="main1">
		<div class="container">
		</div>
	</div>
<!-- //main1 -->
<!-- restaurant -->
<?php
		$name = $_GET['restaurantname'];
		$result = mysql_query("SELECT * FROM Restaurant WHERE RestaurantName='$name'");
		$row = mysql_fetch_array($result);
		$restaurantid = $row['RestaurantID'];
		$frequency = $row['Frequency'] + 1;
		$update =  mysql_query("UPDATE Restaurant SET Frequency='$frequency' WHERE RestaurantName='$name'");
		echo '<br></br><div class="detail"><div class="container"><div class="detail-left col-md-10"><h1>'.$name.'</h1><br>';
		echo '<div class="detail-left wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms"><br></br>';
		echo '<p>Address: <span>'.$row['Address'].'</span></p><br></br>';
		echo '<p>Contact: <span>'.$row['Contact'].'</span></p><br></br>';
		echo '<p>Type: <span>'.$row['Tags'].'</span></p><br></br>';
		if ($_SESSION['valid_user'] != null){
			echo '<form method="post" style="position: relative"><p> Rating: <span>
					<input type="radio" name="rating" value="1" />1
					<input type="radio" name="rating" value="2" />2
					<input type="radio" name="rating" value="3" />3
					<input type="radio" name="rating" value="4" />4
					<input type="radio" name="rating" value="5" />5
					<input type="submit" name="rate" value="submit"</span></p></form>';
			if ($_POST['rate']=="submit"){
				$userinfo=mysql_query("SELECT * FROM User WHERE Account='$_SESSION[valid_user]'", $link);
				$validuser = mysql_fetch_array($userinfo);
				$userId = $validuser['UserID'];
				$ratingSql = mysql_query("SELECT * FROM rating WHERE userID = $userId",$link);
				$rate = mysql_fetch_array($ratingSql);
				$rate[$restaurantid] = $_POST['rating'];
				print_r(mysql_fetch_array($ratingSql));
				print_r($rate);
				//$sql = mysql_query("UPDATE Rating SET ")
			}
		}
		echo '</div>';
    	
		echo '<div class="detail-right wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms"><img src="'.$row['Img_path'].'" alt=" " class="img-responsive" /></div>';
		echo '<div class="detail-left wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms"><h1>Location</h1>';
		map();
?>
	<br></br>
	<div class='container'>
	<h1>Comments</h1>
	<div class="comments detail-left">
	<?php
		main();
	?>
		<div class="comment-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
			<div class="comment-right">
				<div class="Name">
					<?php echo '<h4> Tripadvisor user:  '.$GLOBALS[3].'</h4>'; ?>
				</div>
				<div class="clearfix"> </div>
					<?php echo '<p class="lorem">'.$GLOBALS[4].'</p>'; ?>
				</div>
			<div class="clearfix"> </div>
		</div>
		<div class="comment-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
			<div class="comment-right">
				<div class="Name">
					<?php echo '<h4> Tripadvisor user:  '.$GLOBALS[5].'</h4>'; ?>
				</div>
				<div class="clearfix"> </div>
					<?php echo '<p class="lorem">'.$GLOBALS[6].'</p>'; ?>
				</div>
			<div class="clearfix"> </div>
		</div>
		<div class="comment-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
			<div class="comment-right">
				<div class="Name">
					<?php echo '<h4> Tripadvisor user:  '.$GLOBALS[7].'</h4>'; ?>
				</div>
				<div class="clearfix"> </div>
					<?php echo '<p class="lorem">'.$GLOBALS[8].'</p>'; ?>
				</div>
			<div class="clearfix"> </div>
		</div>
		</div>
		</div>

				</div>
			</div>
			<div class="detail-right">
			<?php
				$recipe = mysql_query("SELECT * FROM Recipe WHERE RestaurantName='$name'");
				echo '<div class="list-group list-group-alternate"><h1>Recipes</h1><br>';
				while ($reciperow = mysql_fetch_array($recipe)){
					echo '<a href="dish.php?recipename='.$reciperow['RecipeName'].'" class="list-group-item"> '.$reciperow['RecipeName'].' <p> Price: $'.$reciperow['Price'].'</p></a>';
				}
				echo '</div>';
			?>
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>
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