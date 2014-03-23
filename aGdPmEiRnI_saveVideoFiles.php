<?php

	session_start();
	
	if(!$_SESSION['adminID'] && !$_SESSION['adminPass'])
	{
		header("location:aGdPmEiRnI_login.php");
		session_destroy();
	}
	elseif(!isset($_SESSION['adminID'],$_SESSION['adminPass']))
	{
		header("location:aGdPmEiRnI_login.php");
		session_destroy();	
	}
	
	$_SESSION['names']=$_FILES['videos']['name'];
	$_SESSION['videoCounter']=0;
	
	$tmpNM=$_FILES['videos']['tmp_name'];
	

	//include('includes/var.php');
	
	$name=$_SESSION['names'];
	
	$count=0;
	
	
	
	foreach($name as $item)
	{
		move_uploaded_file($_FILES["videos"]["tmp_name"][$count],"C:\\wamp\\www\\GPERI New(working for new changes)\\video_gallery_videolb\\video\\".$item);
		echo $_FILES["videos"]["tmp_name"][$count];
		$_SESSION['videoCounter']=$count++;
				
	}
	
	
	if($item!="")
	{
	
	
	require_once('connection.php');
	
	for($j=0;$j<$count;$j++)
	{
		$concat="video\\".$name[$j];
		$concat=mysql_real_escape_string($concat);
	
		$query=("INSERT INTO videos (`id`,`title`,`branch`,`subject`,`path`,`thumbnail`,`desc`,`date`,`topic`,`name`) VALUES (NULL,NULL,NULL,NULL,'$concat',NULL,NULL,NULL,NULL,'$name[$j]')");
		$result=mysql_query($query);
		
	
	}
	mysql_close($conn);
	
	header("location:aGdPmEiRnI_addVideoDetails.php");
	
	}
	else
	{
		header("location:aGdPmEiRnI.php");
	}
	
	
?>