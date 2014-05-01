<?php

	session_start();
	
	$id=$_GET['id'];
	$uid=$_SESSION['uid'];
	$flag=0;
	
	$style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px;background-repeat:no-repeat;background-size:20px;";
	$nFav="background-image:url(img/star0.png);";
	$yFav="background-image:url(img/star1.png);";

	require_once('connection.php');	
	
	$query="SELECT `fav` FROM `$uid` WHERE `$uid`.`vid` = '$id'";
	$result=mysql_query($query);	
	
	if(mysql_num_rows($result) > 0)
	{
		while($row=mysql_fetch_array($result))
		{
			$flag=$row['fav'];	
		}
		if($flag==0)
		{
	
			$query=("UPDATE `$uid` SET `fav`='1' WHERE `$uid`.`vid` = '$id'");
		
			$result=mysql_query($query);
		
			mysql_close($conn);	
			
			$_SESSION['favcount']+=1;	
		
			echo "<div style='".$style.$yFav."'></div>";
		}
		if($flag==1)
		{
	
			$query=("UPDATE `$uid` SET `fav`='0' WHERE `$uid`.`vid` = '$id'");
		
			$result=mysql_query($query);
		
			mysql_close($conn);
		
			$_SESSION['favcount']-=1;
		
			echo "<div style='".$style.$nFav."'></div>";
		}
	}
	else
	{
			$query=("INSERT INTO `db_gperi`.`$uid` (`vid`, `fav`, `lvdate`) VALUES ('$id', '1', NULL)");
		
			$result=mysql_query($query);
		
			mysql_close($conn);
			
			$_SESSION['favcount']+=1;		
		
			echo "<div style='".$style.$yFav."'></div>";
	}

?>