<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style_admin.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GPERI E-Resource Sharing|Admin</title>
</head>


<?php

	session_start();

	if(!isset($_POST['adminID'],$_POST['adminPass']))
	{
		unset($_SESSION['adminID'],$_SESSION['adminPass']);
		session_destroy();
		header("location:aGdPmEiRnI_login.php");
	}
	else
	{

		
		
		$_SESSION['adminID']=$_POST['adminID'];
		$_SESSION['adminPass']=$_POST['adminPass'];
		
		if($_SESSION['adminID']=="GPERIAdmin" && $_SESSION['adminPass']=="GPERIPassword")
		{
			
		}
		else
		{
			session_destroy();
			header("location:aGdPmEiRnI_login.php");				
		}
	
	}
	
		

?>


<body>

<form method="post" action="aGdPmEiRnI_saveVideoFiles.php" enctype="multipart/form-data" >
<div id="cont">

	<div id="sidepanel">
    	<div id="menu">
        	<ul>
            	<li class="currentSel"><a href="#">Add New Videos</a></li>
            </ul>
        </div>
    </div>

	<div id="content">
    	<div class="insidecont">
        
        <div id="vUp">
        
        	<h1 style="font-weight:lighter;"><u>Select Videos to Add</u></h1>
        
			<b>Video:</b>
                <input type="file" name="videos[]"  multiple="multiple"/><br /><br />            
                <input type="submit" name="upload" value="Add Videos" class="submit" />
		</div>
            
        </div>
    </div>

</div>

</form>
</body>
</html>