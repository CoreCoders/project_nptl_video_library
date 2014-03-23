<?php

	$id=$_GET['id'];
	$uid=$_GET['uid'];
	$flag=0;
	$html="Likes:";
	$likes=0;

	require_once('connection.php');
	
	$query="SELECT `lflag` FROM `$uid` WHERE `$uid`.`vid` = '$id'";
	$result=mysql_query($query);
	
	
	if(mysql_num_rows($result) > 0)
	{
		while($row=mysql_fetch_array($result))
		{
			$flag=$row['lflag'];	
		}
		if($flag==0)
		{	
			$query=("UPDATE `$uid` SET `lflag`='1' WHERE `$uid`.`vid` = '$id'");
		
			$result=mysql_query($query);
			
			$query=("UPDATE `db_gperi`.`videos` SET `likes` = likes+1 WHERE `videos`.`id` = $id;");
			
			$result=mysql_query($query);
		

			
		}
		
	}
	else
	{
			
			$query=("INSERT INTO `db_gperi`.`$uid` (`vid`, `fav`, `lvdate`, `wlater`, `lflag`) VALUES ('$id', '0', NULL, '0', '1')");
		
			$result=mysql_query($query);
			
			$query=("UPDATE `db_gperi`.`videos` SET `likes` = likes+1 WHERE `videos`.`id` =$id ;");
			
			$result=mysql_query($query);
		
			
			
	}
	
	$query=("SELECT likes FROM videos WHERE `id`=$id;");
	
	$result=mysql_query($query);
	
	while($row=mysql_fetch_array($result))
	{
			$likes=$row['likes'];
	}
	
	mysql_close($conn);
	
	echo $html.$likes;

?>