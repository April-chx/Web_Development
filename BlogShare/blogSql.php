<?php
error_reporting(0);
session_start();

// Function to check comment and store comment
if(isset($_GET["indexComm"]) && $_GET["indexComm"]==1)
{	
	$c_photoid=$_GET["photoid"];
	$c_text=$_GET["comment_text"];
	$c_username=$_SESSION['username'];
	
	if(!isset($_SESSION['username']))
	{
		echo "Please log in first.";
	}
	else if($c_text=="")
	{
		echo "Please enter your comment.";
	}
	else
	{
		$con = mysql_connect('localhost','root','123456');
		if (!$con)
		{
			die('Connect not successfully:' . mysql_error());
		}
		else
		{
			date_default_timezone_set('PRC');
			$c_time = date('H:i:s  d-m-Y ');
			mysql_select_db("blogshare_database", $con);
			$sql="INSERT INTO comment_list (photoID, content, username, timestamp) VALUES ('$c_photoid','$c_text','$c_username','$c_time')";
				  
			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
		
			mysql_close($con);
			echo "Comment on success.";
		}
	}
}
?>