<?php

	session_start();

	$id=$_GET['id'];
	$uid=$_SESSION['uid'];
	
	require_once('connection.php');
	
	$query="SELECT `wlater` FROM `$uid` WHERE `$uid`.`vid` = '$id'";
	$result=mysql_query($query);
	
	
	if(mysql_num_rows($result) > 0)
	{
		while($row=mysql_fetch_array($result))
		{
			$flag=$row['wlater'];	
		}
		if($flag==0)
		{
	
			$query=("UPDATE `$uid` SET `wlater`='1' WHERE `$uid`.`vid` = '$id'");
		
			$result=mysql_query($query);
			
			$_SESSION['wlatercount']+=1;
		
		}
	}
	else
	{
			$query=("INSERT INTO `db_gperi`.`$uid` (`vid`, `fav`, `lvdate`, `wlater`) VALUES ('$id', '0', NULL, '1')");
		
			$result=mysql_query($query);
			
			$_SESSION['wlatercount']-=1;
		
			
	}
	
	mysql_close($conn);

?>