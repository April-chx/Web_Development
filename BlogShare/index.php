<!-- Name: Chen Huixin -->
<!-- ID number: 179411 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<title>Homepage</title>
<meta name="keywords" content="botany, responsive, bootstrap, free template, fluid layout, templatemo, html css" />
<meta name="description" content="Botany Template is free responsive template with a fluid background image." />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="templatemo_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />
<script type="text/javascript">
	var xmlhttp;
	
	// Function to initialise the xml obj
	function loadXMLDoc(url,cfunc)
	{ 
		// code for IE7+, Firefox, Chrome, Opera, Safari
		if (window.XMLHttpRequest)
		{   
			xmlhttp=new XMLHttpRequest();
		} 
		else // code for IE6, IE5
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=cfunc;
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
	
	// Function to check comment and store comment
	function indexComm(id,pa)
	{			
		var photoid=id;
		var comment_text = document.index.comment_text.value;
		var c_page=pa;	
		var xmlhttp;
		var url = "./blogSql.php?photoid="+photoid+"&comment_text="+comment_text+"&indexComm="+1;
		var index_url = "index.php?page="+c_page;
		var xmlhttp = false;
		
		if(window.XMLHttpRequest) 
		{
			xmlhttp = new XMLHttpRequest();
			if (xmlhttp.overrideMimeType) 
			{
				xmlhttp.overrideMimeType("text/xml");
			}
		}
		else if (window.ActiveXObject) 
		{
			try 
			{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} 
			catch (e) 
			{
				try 
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		if (!xmlhttp) 
		{
			window.alert("no instance");
			return false;
		}

		xmlhttp.open("GET", url, true);		
		xmlhttp.send();
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
				if(xmlhttp.responseText.indexOf("Comment on success.")>-1)
				{
					window.location.assign(index_url);
			 		alert(xmlhttp.responseText);
		   		}
		   		else
		   		{ 	   		
					window.location.assign(index_url);
					alert(xmlhttp.responseText);
		   		}
			}
		}
	}
</script>
</head>
<body class="templatemo_juice_bg">
<div id="main_container">
  <div class="container" id="home">
    <div class="row col-wrap">
      <div id="left_container" class="col col-md-3 col-sm-12">
        <div class="templatemo_logo"> <img src="images/templatemo_logo.png" alt="Botany Theme"> </div>
        <nav id="main_nav">
          <ul class="nav">
            <li class="active"><a href="index.php">Homepage</a></li>
            <form id="form1" name="form1" action="index.php" method="post">
              <?php
			  error_reporting(0);
			  session_start();

			  // If there is a user log in
			  if(isset($_SESSION['username']))
			  {
				  $user_name=$_SESSION['username'];
				  echo "<ul class='nav'><li><a href='submit.php'>Submit</a></li></ul>";

				  $con = mysql_connect('localhost','root','123456');
				  if (!$con)
				  {
					  die('Connect not successfully:' . mysql_error());
				  }
				  else
				  {
					  mysql_select_db("blogshare_database", $con);
					  $res=mysql_query("SELECT administrator FROM user_list WHERE username='$user_name'",$con);
					  $row=mysql_fetch_array($res);
					  
					  if ($row[0] == 1)
					  {
						  // If user is an administrator
						  echo "<ul class='nav'><li><a href='approval.php'>Approval</a></li></ul>";
						  echo "<ul class='nav'><li><a href='users.php'>User List</a></li></ul>";  
					  }					  
				  }
				  mysql_close($con);			  
			  }
			  else
			  {
				  // If user is not an administrator
				  echo "<ul class='nav'><li><a href='login.php'>Login</a></li></ul>";
				  echo "<ul class='nav'><li><a href='register.php'>Register</a></li></ul>";
			  }
					?>
            </form>
          </ul>
        </nav>
        <!-- nav --> 
      </div>
      <div id="right_container" class="col col-md-9 col-sm-12">
        <div class="row">
          <div class="col col-md-12">
            <form id="form2" name="form2" action="index.php" method="post">
              <?php
			  if(isset($_SESSION['username']))
			  {
				  echo "<table align='center'><tr><td><h4>Welcome,$user_name</td><td width='80'><input name='logout' type='submit' value='Logout' class='btn btn-default float_r' /></h4></td><tr></table>";
				  
				  if (isset($_POST["logout"]))
				  {
					  session_destroy();
					  $url = "logout.php";
					  echo "<script language='javascript' type='text/javascript'>window.location.href='$url'</script>";  
				  }
			  }
				?>
            </form>
            <div class="flexslider"> </div>
          </div>
        </div>
        <form name="index" method="post" action="#">
          <article class="row">
            <div class="col col-md-12">
              <?php
			  
				// Method to get page
            	$page=$_GET["page"];
				if( isset($_POST["page"]) && $_POST["page"]!="") 
				{
    				$page=$_POST['page'];
				} 
				if($page=="")
				{
   					$page=1;
				}
				
				// If there is a page
				if(is_numeric($page))
				{
					$con = mysql_connect('localhost','root','123456');
					if (!$con)
					{
						die('Connect not successfully:' . mysql_error());
					}
					else
					{
						mysql_select_db("blogshare_database", $con);
						  
						$res1=mysql_query("SELECT COUNT(*) FROM photo_list WHERE permission=1",$con);
						$row1=mysql_fetch_array($res1);
						$page_count=$row1[0];
			 
						$res2=mysql_query("SELECT MAX(photoID) FROM photo_list",$con);
						$row2=mysql_fetch_array($res2);
						$count=1;
						
						// Get infomation for every page
						for($i=1;$i<=$page_count;$i++)
						{
							if($page==$i)
							{
								$picture_count=1;
								
								while( $count <= $row2[0] )
								{
									$col=$row2[0]-$count+1;
									$res3=mysql_query("SELECT * FROM photo_list WHERE photoID='$col'",$con);
									$row3=mysql_fetch_array($res3);
									
									// Get picture,title,description,username,comment that has been approvaled by administrate
									if($row3[6]==1)
									{
										if($picture_count==$page)
										{	
											$photoid=$row3[0];
											$c_page=$page;
											echo "<img src='submissions/$row3[2]' alt='Templatemo Pic 1' class='img-thumbnail img-responsive img_left' width='290' value='$row3[0]'/>";
											echo "<h2>$row3[1]</h2>";
											echo "<p>$row3[3]</p>";
											echo "<button type='button' class='btn btn-primary' />Uploaded by $row3[4]</button>";
											
											echo "<article class='row'><div class='col col-md-12'><h2>Comment:</h2></div></article>";
											$comment_fi="";
											$res4=mysql_query("SELECT * FROM comment_list WHERE photoID='$photoid'",$con);
											while($row4 = mysql_fetch_array($res4))
											{
												$comment_fi="$comment_fi"."\n"."("."$row4[4]".")"."$row4[3]".":"."$row4[2]";
											}
									
											echo "<textarea name='comment_output' disabled='disabled' cols='140' rows='10'>$comment_fi</textarea><br>";						
											$picture_id=$row3[0];
										}
										$picture_count++;
									}
									$count++;			
								}			
							}
						}
					}
				}
				?>
            </div>
          </article>
          <article class="row">
            <div align="center" class="col col-md-12"> <br>
              <textarea name="comment_text" cols='100' rows='2' placeholder="Comment:" ></textarea>
              <span id="checkComment" style="color:#ffffff;"></span>
              <br>
              <br>
              <table align="center">
                <tr>
                  <td width="60" align="center">
                  <?php
				  // Method to submit comment
                  echo "<button type='button' class='btn btn-primary' onclick='indexComm($photoid,$c_page)' />Submit</button>";
				  ?>
				  </td>
                  <td width="200"><button type="reset" class="btn btn-default float_r">Reset</button></td>
                </tr>
              </table>
            </div>
          </article>
        </form>
        <article class="row">
          <div class="col col-md-12">
            <table align="center">
              <tr align="center">
                <td><span style="color:#ffffff;">Current Page:<?php echo $page;?>/<?php echo $page_count;?></span>
                  <form   method="POST" action="<?php echo $PHP_SELF ?>" target="_self">
                    <br>
                    <?php
					// Method to get page
					if($page!=1)
					{
						echo "<a href=index.php?page=1>Homepage</a> | ";
						echo "<a href=index.php?page=".($page-1).">Previous Page</a>";
					}
					?>
                    <input type="text" size=4 name="page">
                    <input type=submit class="btn btn-primary" value="goto">
                    <?php
					// Method to get page
					if($page<$page_count)
					{
						echo "<a href=index.php?page=".($page+1).">Next Page</a> | ";
						echo "<a href=index.php?page=".$page_count.">Last Page</a>";
					}
					?>
                  </form></td>
              </tr>
            </table>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
</body>
</html>