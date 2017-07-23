<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<title>approval</title>
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
        <div class="templatemo_logo"> <img src="images/templatemo_logo.png" alt="Botany Theme"> </div>
        <nav id="main_nav">
          <ul class="nav">
            <li><a href="index.php">Homepage</a></li>
            <li><a href="submit.php">Submit</a></li>
            <li class="active"><a href="approval.php">Approval</a></li>
            <li><a href="users.php">User List</a></li>
          </ul>
        </nav>
        <!-- nav --> 
      </div>
      <div id="right_container" class="col col-md-9 col-sm-12">
        <div class="row">
          <div class="col col-md-12">
            <h2>Approval</h2>
          </div>
        </div>
        <form id="form" name="form" action="approval.php" method="post">
          <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
            <caption>
            <h4>Check Pending</h4>
            </caption>
            <tr>
              <th scope="col" style="color:#ffffff;">Photo ID</th>
              <th scope="col" style="color:#ffffff;">Title</th>
              <th scope="col" style="color:#ffffff;">Image name</th>
              <th scope="col" style="color:#ffffff;">Image file</th>
              <th scope="col" style="color:#ffffff;">User name</th>
              <th scope="col" style="color:#ffffff;">Timestamp</th>
              <th scope="col" style="color:#ffffff;">Permission</th>
            </tr>
            <?php
			error_reporting();
			
			// Method to output the pictures that is not approved by administrator
			$con = mysql_connect('localhost','root','123456');
			if (!$con)
			{
				die('Connect not successfully:' . mysql_error());
			}
			else
			{
				mysql_select_db("blogshare_database", $con);
				$res=mysql_query("SELECT * FROM photo_list",$con);
				
				while($row = mysql_fetch_array($res))
				{
					if($row['photoID']!="" && $row['permission'] == 0)
					{
						echo "<tr>
    					<th scope='row' style=\"color:#ffffff;\">$row[0]</th>
    					<td style=\"color:#ffffff;\">$row[1]</td>
						<td style=\"color:#ffffff;\">$row[2]</td>
						<td style=\"color:#ffffff;\"><img src='submissions/$row[2]' width='120' /></td>
						<td style=\"color:#ffffff;\">$row[4]</td>
						<td style=\"color:#ffffff;\">$row[5]</td>
						<td><input name='checkbox[]' type='checkbox' value='$row[0]' /></td>
						</tr>";
					}
				}
			} 
			
			// Method to submit the pictures that is approved by administrator
			if(isset($_POST["ok"]))
			{
				$res2=mysql_query("SELECT * FROM photo_list",$con);
				$value_num = 0;
				$value = $_POST['checkbox'];
				
				while($r_row = mysql_fetch_array($res2))
				{
					if($r_row[0]==$value[$value_num])
					{
						mysql_query("UPDATE photo_list SET permission='1' WHERE photoID = $value[$value_num]",$con);
						$value_num++;
					}
				}
				
				$url = "approval.php";  
				echo "<script language='javascript' type='text/javascript'>alert('Congratulations! You have approvaled successfully.')</script>";
				echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";			
			}
  			?>
          </table>
          <br>
          <table align="center">
            <tr>
              <td width="148" align="center"><input type="submit" name="ok" value="OK" class="btn btn-primary"></td>
              <td width="160"><button type="button" class="btn btn-default float_r" onclick="location.href='index.php';" >Cancel</button></td>
            </tr>
          </table>
          <br><br><br><br><br><br><br>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>