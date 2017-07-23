<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>login</title>
	<meta name="keywords" content="botany, contact, maps, responsive, bootstrap, free template, fluid layout, templatemo, html css" />
	<meta name="description" content="Botany Template, Contact, Maps, responsive page with bootstrap" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="templatemo_style.css" rel="stylesheet" type="text/css">
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
        
		// Function to judge name by ajax.
        function login1(txt)
        {  
            loadXMLDoc("./userSql.php?name="+txt+"&login="+1,function()
            {	
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("checkName").innerHTML=xmlhttp.responseText;
                }
            }); 
        }
		
		// Function to check all information again by ajax
		function login2()
		{
			var name = document.login.name.value;
			var password = document.login.password.value;
			var xmlhttp;
			var url = "./userSql.php";
			var url = "./userSql.php?name="+name+"&password="+password+"&login="+2;
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
					if(xmlhttp.responseText.indexOf("Congratulations! You have logged in successfully.")>-1)
					{
						window.location.assign("index.php");
						alert(xmlhttp.responseText); 
					}
					else
					{ 	   		
						window.location.assign("login.php");
						alert(xmlhttp.responseText);
					}
				}
			}
		}
    </script>
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
							<li class="active"><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
						</ul>
					</nav> <!-- nav -->	
				</div>			  	
				<div id="right_container" class="col col-md-9 col-sm-12">
					<div class="row"><div class="col col-md-12"><h2>Login</h2></div></div>
					
					<form name="login" action="login.php" method="post">
						<div class="row">
						  <div class="col-md-6">
								<h4>User name</h4>
                                <input name="name" type="text" class="form-control" onblur="login1(this.value)" />
                                <span id="checkName" style="color:#ffffff;"></span>
                                								
								<h4>Password</h4>
                                <input name="password" type="password" class="form-control" /><br>
      															
								<button type="button" class="btn btn-primary" onclick="login2()" />Submit</button>
								<button type="button" class="btn btn-default float_r" onclick="location.href='index.php';" />Cancel</button>								
									                                							
							</div> 							
						</div> <!-- row -->
					</form> 
    				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>                     
				</div>
			</div>            
		</div>		
	</div>
</body>
</html>