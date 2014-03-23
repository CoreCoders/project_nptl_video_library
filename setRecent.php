<?php

	$id=$_GET['id'];
	$lvdate=date('Y-m-d H:i:s');
	$uid=$_GET['uid'];
	
	require_once('connection.php');
	
	$query="SELECT `lvdate` FROM `$uid` WHERE `$uid`.`vid` = '$id'";
	$result=mysql_query($query);
	
	
	if(mysql_num_rows($result) > 0)
	{	
			$query=("UPDATE `$uid` SET `lvdate`='$lvdate' WHERE `$uid`.`vid` = '$id'");
		
			$result=mysql_query($query);
			
			$query=("UPDATE videos SET `vcounts`=vcounts+1 WHERE videos.id = '$id'");		
			$result=mysql_query($query);
			
			$query=("UPDATE `$uid` SET `wlater`='0' WHERE `$uid`.`vid` = '$id'");
			$result=mysql_query($query);
		
	}
	else
	{
			$query=("INSERT INTO `db_gperi`.`$uid` (`vid`, `fav`, `lvdate`) VALUES ('$id', NULL, '$lvdate')");
		
			$result=mysql_query($query);
			
			$query=("UPDATE videos SET `vcounts`=vcounts+1 WHERE videos.id = '$id'");		
			$result=mysql_query($query);
		
			

	}
	
	mysql_close($conn);
	
	header("location:showVideo.php?id=$id");
	

?>