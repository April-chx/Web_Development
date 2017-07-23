<?php
  $link=mysql_connect('localhost','root','');
  mysql_query("CREATE DATABASE Foodie",$link);
  mysql_select_db("Foodie", $link);

  session_start();

  $userinfo=mysql_query("SELECT * FROM User WHERE Account='$_SESSION[valid_user]'", $link);
  $validuser = mysql_fetch_array($userinfo);
  $userId = $validuser['UserID'];
  $ratingSql = "SELECT * FROM rating WHERE userID = $userId";
  $ratingData = mysql_query($ratingSql,$link);
  $row = mysql_fetch_array($ratingData);
  $notRate = array();
  $hasRate = array();
  $userAvg = array();

  $avgSql = "SELECT * FROM rating";
  $avgData = mysql_query($avgSql,$link);
  while($avgRow = mysql_fetch_array($avgData)){

    $userSum = 0;
    $userCount = 0;
    
    for($x=1;$x<count($avgRow)-1;$x++){
      if(!is_null($avgRow[$x])){
        $userSum = $userSum + $avgRow[$x];
        $userCount++;
      }
    }
    if($userCount==0){
      array_push($userAvg, 0);
    }else{
      array_push($userAvg, $userSum/$userCount);
    }
  }

  for($i=1;$i<count($row)-1;$i++){
    if(is_null($row[$i])){
      array_push($notRate, $i);
    }
    else{
      array_push($hasRate, $i);
    }
  }
  $recArray = array();
  for($j=0;$j<count($notRate);$j++){
    $pUp = 0;
    $pDown = 0;
    $simArray = array();

    for ($k=0; $k < count($hasRate); $k++) { 
      
      $commonRatingSql = "SELECT $notRate[$j],$hasRate[$k] FROM rating";
      $comRatingData = mysql_query($commonRatingSql,$link);
      $up = 0;
      $downLeft = 0;
      $downRight = 0;
      $everyUser = 0;
      while ($comRow = mysql_fetch_array($comRatingData)){
        $everyUser++;
        $notNum = $notRate[$j];
        $hasNum = $hasRate[$k];

        if(!is_null($comRow[$notNum]) && !is_null($hasNum)){
          $up = ($comRow[$notNum]-$userAvg[$everyUser-1])*($comRow[$hasNum]-$userAvg[$everyUser-1])+$up;
          $downLeft = pow($comRow[$notNum]-$userAvg[$everyUser-1], 2)+$downLeft;
          $downRight = pow($comRow[$hasNum]-$userAvg[$everyUser-1], 2)+$downRight;
        }
      }
      $sim = $up/(sqrt($downLeft)*sqrt($downRight));
      //echo $hasNum."\t".$sim."\t"."a";
      array_push($simArray, $sim);
      //$simArray[$k] = $sim;
    }
    arsort($simArray);
    //echo array_search($simSort[1], $simArray).'\t';
    //echo $simSort[1].'\t'.$simArray[1];
    $top3=array_slice($simArray, 0, 3);
    //echo $pp[1];
    //$oo=array_keys($simArray,$pp[1],true);
    //print_r($oo[0]);
    for($y=0;$y<3;$y++){
      //echo $simArray[$y];
      $hasRatePosi = array_keys($simArray,$top3[$y],true);
      $posi = $hasRatePosi[0];
      $pUp = $top3[$y]*$row[$hasRate[$posi]]+$pUp;
      $pDown = abs($top3[$y])+$pDown;
    }
    $p = $pUp/$pDown;
    //echo $p;
    array_push($recArray, $p);
  }
  arsort($recArray);
  $top5=array_slice($recArray, 0, 5);
  


?>
