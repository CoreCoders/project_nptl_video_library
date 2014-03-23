<?php

	session_start();
	
	$_SESSION['branch']=$_POST['branch'];
	$_SESSION['subject']=$_POST['subject'];
	
	header("location:main_page_videos.php");	


?>