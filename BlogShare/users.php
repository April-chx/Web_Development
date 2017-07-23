<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>users</title>
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
                            <li><a href="submit.php">Submit</a></li>
                            <li><a href="approval.php">Approval</a></li>
                            <li class="active"><a href="users.php">User List</a></li>
						</ul>
					</nav> <!-- nav -->	
				</div>	  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row"><div class="col col-md-12"><h2>Users List</h2></div></div>
					<form id="form" name="form" action="users.php" method="post">
                    <br>
                    <table align="center"width="200" border="1" cellspacing="2" cellpadding="2">                    
                      <tr>
                        <th scope="col" style="color:#ffffff;">User ID</th>
                        <th scope="col" style="color:#ffffff;">User name</th>
                        <th scope="col" style="color:#ffffff;">Email</th>
                        <th scope="col" style="color:#ffffff;">Gender</th>
                        <th scope="col" style="color:#ffffff;">Age</th>
                        <th scope="col" style="color:#ffffff;">Blood type</th>
                        <th scope="col" style="color:#ffffff;">Profession</th>
                        <th scope="col" style="color:#ffffff;">Phone number</th>
                        <th scope="col" style="color:#ffffff;">Interest</th>
                        <th scope="col" style="color:#ffffff;">Administrator</th>
                      </tr>

					  <?php
					  error_reporting();
					  
					  // Method to output users
					  $con = mysql_connect('localhost','root','123456');
					  if (!$con)
					  {
						  die('Connect not successfully:' . mysql_error());
					  }
					  else
					  {
						  mysql_select_db("blogshare_database", $con);
						  $res=mysql_query("SELECT * FROM user_list",$con);
						  
						  while($row = mysql_fetch_array($res))
						  {
							  if($row['userID']!="")
							  {
								  if ($row['administrator'] == 1)
								  {
									  $select = "checked";
								  }
								  else
								  {
									  $select = null;
								  }
								  
								  echo "<tr>
									  <th scope='row' style=\"color:#ffffff;\">$row[0]</th>
									  <td style=\"color:#ffffff;\">$row[1]</td>
									  <td style=\"color:#ffffff;\">$row[3]</td>
									  <td style=\"color:#ffffff;\">$row[4]</td>
									  <td style=\"color:#ffffff;\">$row[5]</td>
									  <td style=\"color:#ffffff;\">$row[6]</td>
									  <td style=\"color:#ffffff;\">$row[7]</td>
									  <td style=\"color:#ffffff;\">$row[8]</td>
									  <td style=\"color:#ffffff;\">$row[9]</td>
									  <td><input name='checkbox[]' type='checkbox' value='$row[0]' $select /></td>
									  </tr>";
							  }							  
						  }
					  }
						 
					  // Method to change limits of authority for users.
					  if(isset($_POST["ok"]))
					  { 
						  $res2=mysql_query("SELECT * FROM user_list",$con);
						  $value_num = 0;
						  $value = $_POST['checkbox'];
						  
						  while($r_row = mysql_fetch_array($res2))
						  {
							  if($r_row[0]==$value[$value_num])
							  {
								  mysql_query("UPDATE user_list SET administrator='1' WHERE userID = $value[$value_num]",$con);
								  $value_num++;
							  }
							  else
							  {
								  mysql_query("UPDATE user_list SET administrator='0' WHERE userID = $r_row[0]",$con);
							  }
						  }
						  
						  $url = "users.php";  
						  echo "<script language='javascript' type='text/javascript'>alert('Congratulations! You have altered successfully.')</script>";
						  echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";
					  }	                    
                    ?>
                    </table><br>
                    <table align="center"><tr>
                      <td width="148" align="center"><input type="submit" name="ok" value="OK" class="btn btn-primary"></td>
                      <td width="160"><button type="button" class="btn btn-default float_r" onclick="location.href='index.php';" />Cancel</button></td></tr></table><br><br><br><br><br><br><br><br><br><br><br>
                    </form>                    
					</div>                     
				</div>
			</div>            
		</div>		
	</div>
</body>
</html>