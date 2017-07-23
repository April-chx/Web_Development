<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>submit</title>
	<meta name="keywords" content="botany, contact, maps, responsive, bootstrap, free template, fluid layout, templatemo, html css" />
	<meta name="description" content="Botany Template, Contact, Maps, responsive page with bootstrap" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo_garden_bg">
	<div id="main_container">
		<div class="container" id="contact">
			<div class="row col-wrap">			 
				<div id="left_container" class="col col-md-3 col-sm-12">
                	<div class="templatemo_logo">
						<img src="images/templatemo_logo.png" alt="Botany Theme">
					</div>
					<nav id="main_nav">
						<ul class="nav">
							<li><a href="index.php">Homepage</a></li>
						</ul>
					</nav> <!-- nav -->	
				</div>	  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row"><div class="col col-md-12"><h2>Submit</h2></div></div>
					
					<form name="submitForm" enctype="multipart/form-data" method="post" action="submit.php">
						<div class="row">
						  <div class="col-md-6">
                          		<h4>Title:</h4>
								<input type="text" name="title" class="form-control" >
	
								<h4>Select a file:
								<input type="file" name="uploadfile" id="uploadfile" ></h4><br>
          
								<h4>Describe:</h4>
								<textarea name="describe" id="describe" cols="45" rows="5" class="form-control"></textarea><br>
      															
								<button type="submit" name="submit" class="btn btn-primary"/>Submit</button>
								<button type="button" class="btn btn-default float_r" onclick="location.href='index.php';" />Cancel</button><br><br><br><br><br><br><br><br>									                                							
							</div> 							
						</div> <!-- row -->
					</form> 
                    <?php
					error_reporting(0);
					session_start();
					 
					// Method to upload files
					if(isset($_POST["submit"]))
					{
						$img_title = $_POST["title"];
						
						if( $img_title == "" )
						{
							echo "<script language='javascript' type='text/javascript'>alert('Please enter your title.')</script>";
						}
						else if($_FILES["uploadfile"]['error']==4)
						{
							echo "<script language='javascript' type='text/javascript'>alert('Please upload your file.')</script>";
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
								mysql_select_db("blogshare_database", $con);
								
								$user_name = $_SESSION['username'];
								$img_name = $_FILES['uploadfile']['name'];
	
								date_default_timezone_set('PRC');
								$img_time = date('H:i:s  d-m-Y '); 		 
								
								$sql="INSERT INTO photo_list(title,image_name,description,username,timestamp, permission) VALUES('$img_title','$img_name','$_POST[describe]','$user_name','$img_time','0')";
				  
								if (!mysql_query($sql,$con))
								{
									die('Error: ' . mysql_error());
									mysql_close($con);
								}
								else
								{
									move_uploaded_file($_FILES['uploadfile']['tmp_name'],"submissions/".$img_name);
									mysql_close($con);
									
									echo "<script language='javascript' type='text/javascript'>alert('Congratulations! You have submitted successfully.')</script>";
									$url = "index.php";  
						  			echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";
								}
							}
						}
					}
					?>                     
				</div>
			</div>            
		</div>		
	</div>
</body>

</html>