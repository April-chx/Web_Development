<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<title>register</title>
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
	
	// Function to judge user name by ajax.
	function userinfo1(txt) 
	{  
		loadXMLDoc("./userSql.php?name="+txt+"&register="+1,function()
		{	
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("checkName").innerHTML=xmlhttp.responseText;
			}
		}); 
	}
	
	// Function to judge password by ajax.
	function userinfo2(txt) 
	{  
		loadXMLDoc("./userSql.php?password1="+txt+"&register="+2,function()
		{	
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("checkPassword1").innerHTML=xmlhttp.responseText;
			}
		}); 
	}
	
	// Function to judge password again by ajax.
	function userinfo3(txt) 
	{  
		var password1=document.getElementById("password1").value;
	
		loadXMLDoc("./userSql.php?password2="+txt+"&password1="+password1+"&register="+3,function()
		{	
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("checkPassword2").innerHTML=xmlhttp.responseText;
			}
		}); 
	}
	
	// Function to judge email by ajax.
	function userinfo4(txt)
	{  
		loadXMLDoc("./userSql.php?email="+txt+"&register="+4,function()
		{	
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("checkEmail").innerHTML=xmlhttp.responseText;
			}
		}); 
	}
	
	// Function to output gender by ajax.
	function radiobox() 
	{
		var str=document.getElementsByName("gender");  
		var objarray=str.length
		var chestr="" 
		
		for (i=0;i<objarray;i++)
		{　
			if(str[i].checked == true)
			{  
				chestr=str[i].value;
			}  
		}
		return chestr;
	}
	
	// Function to output interest by ajax.
	function checkbox() 
	{  
		var str=document.getElementsByName("interest");  
		var objarray=str.length
		var chestr="" 
		
		for (i=0;i<objarray;i++)
		{　
			if(str[i].checked == true)
			{  
				chestr+=str[i].value+",";
			}  
		}
		return chestr; 
	}
	
	// Function to submit register information or judge infomation by ajax.
	function userinfo5() 
	{
		var name = document.register.name.value;
		var password1 = document.register.password1.value;
		var password2 = document.register.password2.value;
		var email = document.register.email.value;
		var gender = radiobox();
		var age = document.register.age.value;
		var blood=document.getElementById("blood").value;
		var profession = document.register.profession.value;
		var phone = document.register.phone.value;
		var interest = checkbox();
		var xmlhttp;
		var url = "./userSql.php";
		var url = "./userSql.php?name="+name+"&password1="+password1+"&password2="+password2+"&email="+email+"&gender="+gender+"&age="+age+"&blood="+blood+"&profession="+profession+"&phone="+phone+"&interest="+interest+"&register="+5;
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
				if(xmlhttp.responseText.indexOf("Congratulations! You have registered successfully.")>-1)
				{
			 		window.location.assign("index.php");
			 		alert(xmlhttp.responseText); 
		   		}
		   		else
		   		{ 	   		
					window.location.assign("register.php");
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
        <div class="templatemo_logo"> <img src="images/templatemo_logo.png" alt="Botany Theme"> </div>
        <nav id="main_nav">
          <ul class="nav">
            <li><a href="index.php">Homepage</a></li>
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="register.php">Register</a></li>
          </ul>
        </nav>
        <!-- nav --> 
      </div>
      <div id="right_container" class="col col-md-9 col-sm-12">
        <div class="row">
          <div class="col col-md-12">
            <h2>Register</h2>
          </div>
        </div>
        <form name="register" action="register.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <h4>User name</h4>
              <input name="name" type="text" class="form-control" onblur="userinfo1(this.value)" />
              <span id="checkName" style="color:#ffffff;"></span>
              <h4>Create password</h4>
              <input name="password1" type="password" id="password1" class="form-control"  onblur="userinfo2(this.value)" />
              <span id="checkPassword1" style="color:#ffffff;"></span>
              <h4>Reenter password</h4>
              <input name="password2" type="password" class="form-control"  onblur="userinfo3(this.value)" />
              <span id="checkPassword2" style="color:#ffffff;"></span>
              <h4>Email address</h4>
              <input name="email" type="email" class="form-control" onblur="userinfo4(this.value)" />
              <span id="checkEmail" style="color:#ffffff;"></span>
              <h4>Gender:
                <input type="radio" name="gender" value="male" >
                <label style="color:#ffffff;">male</label>
                <input type="radio" name="gender" value="female" >
                <label style="color:#ffffff;">female</label>
              </h4>
              <h4>Age</h4>
              <input type="text" name="age" class="form-control" >
              <h4>Blood type:
                <select name="blood" id="blood" >
                  <option value="Unknow">Unknow</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
              </h4>
              <h4>Profession</h4>
              <input type="text" name="profession" class="form-control" >
              <h4>Phone number</h4>
              <input type="text" name="phone" class="form-control" >
              <h4> Interest:
              <label>
              <input type="checkbox" name="interest" value="music">
              music</label>
              <label>
              <input type="checkbox" name="interest" value="sports" >
              sports</label>
              <label>
              <input type="checkbox" name="interest" value="travel" >
              travel</label>
              <label>
              <input type="checkbox" name="interest" value="read" >
              read</label></h4>
              <br>
              <button type="button" class="btn btn-primary" onclick="userinfo5()" />Submit</button>
              <button type="button" class="btn btn-default float_r" onclick="location.href='index.php';" />
              Cancel
              </button>
              <span id="sub" style="color:#ffffff;"></span>
              <br>
              <br>
            </div>
          </div>
          <!-- row -->
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>