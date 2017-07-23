<?php
error_reporting(0);
session_start();

// Connect the database 
$con = mysql_connect('localhost','root','123456'); 

// If connect the database not successfully, output the error information
if (!$con) 
{
	die('Connect not successfully:' . mysql_error());
}
else // If connect the database successfully
{ 
	// Select database
	mysql_select_db("blogshare_database", $con); 
}

// Function to judge user name by ajax.
if(isset($_GET["register"]) && $_GET["register"]==1) 
{
	$u_name=$_GET["name"];
	
	if($u_name=="")
	{
		echo "Please enter your user name.";
	}
	else
	{
		$res=mysql_query("SELECT * FROM user_list",$con);
				 
		while($row = mysql_fetch_array($res))
		{
			if($row['username']==$u_name)
			{
				echo "User name already exists.";
			}
		}			
	}
}

// Function to judge password by ajax.
if(isset($_GET["register"]) && $_GET["register"]==2)
{
	$u_password1=$_GET["password1"];
	
	if($u_password1=="")
	{
		echo "Please enter your password.";
	}
}

// Function to judge password again by ajax.
if(isset($_GET["register"]) && $_GET["register"]==3)
{	
	$u_password2=$_GET["password2"];
	$u_password1=$_GET["password1"];
	
	if($u_password2=="")
	{
		echo "Please enter your password again.";
	}
	else if($u_password2!=$u_password1)
	{
		echo "These passwords don't match.";
	}
}

// Function to judge email by ajax.
if(isset($_GET["register"]) && $_GET["register"]==4)
{
	$u_email=$_GET["email"];
	
	if($u_email=="")
	{
		echo "Please enter your email address.";
	}
}

// Function to submit register information or judge infomation by ajax.
if(isset($_GET["register"]) && $_GET["register"]==5)
{			
	$u_name=$_GET["name"];
	$u_password1=$_GET["password1"];
	$u_password2=$_GET["password2"];
	$u_email=$_GET["email"];
	
	if($u_name=="")
	{
		echo "Please enter your user name.";
	}
	else
	{
		$hint="";
		$res=mysql_query("SELECT * FROM user_list",$con);
				 
		while($row = mysql_fetch_array($res))
		{
			if($row['username']==$u_name)
			{
				$hint="User name already exists.";
				echo $hint;
			}
		}
		
		if($hint=="" && $u_password1=="")
		{
			echo "Please enter your password.";
		}
		else if($hint=="" && $u_password1!="")
		{
			if($u_password2=="")
			{
				echo "Please enter your password again.";
			}
			else if($u_password2!=$u_password1)
			{
				echo "These passwords don't match.";
			}
			else
			{
				if($u_email=="")
				{
					echo "Please enter your email address.";
				}
				else
				{
					// Shore the regiser information into mysql
					$sql="INSERT INTO user_list (username, password, email, gender, age, blood, profession, phone, interest, administrator) VALUES ('$_GET[name]','$_GET[password2]','$_GET[email]','$_GET[gender]','$_GET[age]','$_GET[blood]','$_GET[profession]','$_GET[phone]','$_GET[interest]','0')";
				  
					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
				
					mysql_close($con);
					$_SESSION['username']=$u_name; 
					echo "Congratulations! You have registered successfully.";
				}
			}
		}
	}	
}

// Function to judge name by ajax.
if(isset($_GET["login"]) && $_GET["login"]==1)
{
	$u_name=$_GET["name"];
	
	if($u_name=="")
	{
		echo "Please enter your user name.";
	}
	else
	{
		$username_exist=0;
		$res=mysql_query("SELECT * FROM user_list",$con);
				 
		while($row = mysql_fetch_array($res))
		{
			if($row['username']==$u_name)
			{
				$username_exist=1;
			}
		}
		
		if($username_exist==0)
		{
			echo "User name doesn't exist.";
		}
	}
}

// Function to check all information again by ajax
if(isset($_GET["login"]) && $_GET["login"]==2)
{
	$u_name=$_GET["name"];
	$u_password=$_GET["password"];
	
	if($u_name=="")
	{
		echo "Please enter your user name.";
	}
	else
	{
		$username_exist=0;
		$res=mysql_query("SELECT * FROM user_list",$con);
				 
		while($row = mysql_fetch_array($res))
		{
			if($row['username']==$u_name)
			{
				$username_exist=1;
			}
		}
		
		if($username_exist==0)
		{
			echo "User name doesn't exist.";
		}
		else if($username_exist==1)
		{
			if($u_password=="")
			{
				echo "Please enter your password.";
			}
			else
			{
				$userpw_exist=0;
				$res=mysql_query("SELECT * FROM user_list",$con);
						 
				while($row = mysql_fetch_array($res))
				{
					if($row['username']==$u_name && $row['password']==$u_password)
					{
						$userpw_exist=1;
					}
				}
				if($userpw_exist==0)
				{
					echo "Wrong password.";
				}
				else
				{
					$_SESSION['username']=$u_name;
					echo "Congratulations! You have logged in successfully.";
				}
			}
		}
	}
}
?>