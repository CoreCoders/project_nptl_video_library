<?php

	session_start();

	if(isset($_SESSION['uid']))
	{
		$id=$_SESSION['uid'];
		
		require_once('connection.php');
		
		$query=("UPDATE `users` SET `status`='0' WHERE `users`.`uid` = '$id'");		
		$result=mysql_query($query);
		mysql_close($conn);
		
		session_destroy();
		header("location:index.php");
	}
	else
	{
		session_destroy();
		header("location:index.php");	
	}

?>