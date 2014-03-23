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
	
	$name=$_SESSION['names'];
	$count=$_SESSION['videoCounter'];
	
	
	move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"C:\\wamp\\www\\GPERI New(working for new changes)\\video_gallery_videolb\\thumbnails\\".$_FILES["thumbnail"]["name"]);
	

	//include('includes/var.php');
	//include('add_videos.php');
	
	
	
	$title=$_POST['title'];
	$branch=$_POST['branch'];
	$subject=$_POST['subject'];
	$thumbnail=$_FILES["thumbnail"]["name"];
	$topic=$_POST['topic'];
	$desc=$_POST['desc'];
		
	$concat2="video_gallery_videolb\\thumbnails\\".$thumbnail;
	$concat2=mysql_real_escape_string($concat2);
	
	require_once('connection.php');
	
	//$query=("INSERT INTO videos (`id`,`title`,`branch`,`subject`,`path`,`thumbnail`,`desc`,`date`,`topic`,`name`,`fav`) VALUES (NULL,'$title','$branch','$subject',NULL,'$concat2','$desc',NULL,'$topic',NULL,0) WHERE name LIKE '$name[$count]'");
	
	$query=("UPDATE `videos` SET `title` = '$title', `branch`='$branch', `subject` = '$subject', `thumbnail`='$concat2', `desc`='$desc', `topic`='$topic' WHERE `videos`.`name` ='$name[$count]'");
	
	$result=mysql_query($query);
	
	mysql_close($conn);
	
	//echo $name[$count];
	
	$count--;
	
	//echo $count;
	
	if($count == -1)
	{
	
		unset ($_SESSION['videoCounter']);
		//echo "hello";
		header("location:aGdPmEiRnI.php");	
		
		
	}
	else
	{
		echo "no hello";	
		$_SESSION['videoCounter']=$count;
		header("location:aGdPmEiRnI_addVideoDetails.php");
	}
	
	
	//echo $name[$count];
	
	
	
	

?>