<?php

	$id=$_GET['id'];
	$uid=$_GET['uid'];
	
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
		
		}
	}
	else
	{
			$query=("INSERT INTO `db_gperi`.`$uid` (`vid`, `fav`, `lvdate`, `wlater`) VALUES ('$id', '0', NULL, '1')");
		
			$result=mysql_query($query);
		
			
	}
	
	mysql_close($conn);

?>