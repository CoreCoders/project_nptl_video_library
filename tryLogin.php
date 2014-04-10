<?php


	session_start();
	
	$id=$_POST['GPERIid'];
	$pass=$_POST['GPERIpass'];
	
	require_once('connection.php');
	
	$id=mysql_real_escape_string($id);
	$pass=mysql_real_escape_string($pass);
	$pass=md5($pass);
	
	$query=("SELECT * FROM  `users` WHERE `uid` LIKE '$id' AND `pass` LIKE '$pass'");
		
	$result=mysql_query($query);
	
		
		
	if(mysql_num_rows($result) > 0)
	{	
	
		$row=mysql_fetch_array($result);
		
		$status=$_SESSION['status']=1;
		$_SESSION['uid']=$id;
		
		$_SESSION['fname']=$row['fname'];
		$_SESSION['lname']=$row['lname'];
		$_SESSION['abt']=$row['abt'];
		$_SESSION['cnt']=$row['cnt'];
		$_SESSION['pic']=$row['pic'];
		$_SESSION['email']=$row['email'];
		
		if($row['activation']==0)
		{
			
			//header("location:")			
			
			$query=("UPDATE `users` SET `status`='$status', `activation`='1' WHERE `users`.`uid` = '$id'");	
			$result=mysql_query($query);
			$query=("CREATE TABLE `db_gperi`.`$id` (`vid` bigint(12),`fav` tinyint(1),`lvdate` datetime, `wlater` tinyint(1), `lflag` tinyint(1))");
			$result=mysql_query($query);
			mysql_close($conn);
			
		}
		$query=("UPDATE `users` SET `status`='$status' WHERE `users`.`uid` = '$id'");	
		$result=mysql_query($query);
		
		
		mysql_close($conn);
		
		header("location:choicePage.php");
	}
	else
	{
		mysql_close($conn);	
		session_destroy();
		
		header("location:index.php");
	}

?>