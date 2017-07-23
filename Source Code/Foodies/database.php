<?php
	$link=mysql_connect('localhost','root','');
	mysql_query("CREATE DATABASE Foodie",$link);
	mysql_select_db("Foodie", $link);

	$restauranttable = "CREATE TABLE Restaurant
	(	
		`RestaurantID` int(11) NOT NULL,
	 	`RestaurantName` varchar(50) NOT NULL,
	  `Address` varchar(100) DEFAULT NULL,
	  `Contact` varchar(30) DEFAULT NULL,
	  `Tags` varchar(50) DEFAULT NULL,
	  `Frequency` int(11) DEFAULT NULL,
	  `Img_path` longtext,
	  PRIMARY KEY (`RestaurantID`)
	)";
	mysql_query($restauranttable,$link);

	$recipetable = "CREATE TABLE Recipe
	(
		`RecipeID` int(11) NOT NULL,
    `RecipeName` varchar(50) NOT NULL,
    `RestaurantID` int(11) NOT NULL,
    `RestaurantName` varchar(50) NOT NULL,
    `Price` float NOT NULL,
    `Description` longtext,
    `Img_path` longtext,
    `Frequency` int(11) DEFAULT NULL,
    PRIMARY KEY (`RecipeID`)
	)";
	mysql_query($recipetable,$link);

	$rating = "CREATE TABLE IF NOT EXISTS `Rating` (
      `UserID` int(11) NOT NULL,
      `1` int(11) DEFAULT NULL,
      `2` int(11) DEFAULT NULL,
      `3` int(11) DEFAULT NULL,
      `4` int(11) DEFAULT NULL,
      `5` int(11) DEFAULT NULL,
      `6` int(11) DEFAULT NULL,
      `7` int(11) DEFAULT NULL,
      `8` int(11) DEFAULT NULL,
      `9` int(11) DEFAULT NULL,
      `10` int(11) DEFAULT NULL,
      `11` int(11) DEFAULT NULL,
      `12` int(11) DEFAULT NULL,
      `13` int(11) DEFAULT NULL,
      `14` int(11) DEFAULT NULL,
      `15` int(11) DEFAULT NULL,
      `16` int(11) DEFAULT NULL,
      `17` int(11) DEFAULT NULL,
      `18` int(11) DEFAULT NULL,
      `19` int(11) DEFAULT NULL,
      `20` int(11) DEFAULT NULL,
      `21` int(11) DEFAULT NULL,
      `22` int(11) DEFAULT NULL,
      `23` int(11) DEFAULT NULL,
      `24` int(11) DEFAULT NULL,
      `25` int(11) DEFAULT NULL,
      `26` int(11) DEFAULT NULL,
      `27` int(11) DEFAULT NULL,
      `28` int(11) DEFAULT NULL,
      `29` int(11) DEFAULT NULL,
      `30` int(11) DEFAULT NULL,
      PRIMARY KEY (`UserID`)
    ) ";
	mysql_query($rating,$link);

  $user = "CREATE TABLE IF NOT EXISTS `User` (
    `UserID` int(11) NOT NULL,
    `Account` varchar(30) NOT NULL,
    `Password` varchar(30) NOT NULL,
    `Firstname` varchar(30) NOT NULL,
    `Lastname` varchar(30) NOT NULL,
    `Email` varchar(50) NOT NULL,
    PRIMARY KEY (`UserID`)
  )";
  mysql_query($user,$link);

  $UsersResult = mysql_query("select * from User");
  $userid = array();
  $account = array();
  $passw = array();
  while($UserRows = mysql_fetch_array($UsersResult))
  {
    $userid[] = $UserRows['UserID'];
    $account[] = $UserRows['Account'];
    $passw[] = $UserRows['Password'];
  }
?>