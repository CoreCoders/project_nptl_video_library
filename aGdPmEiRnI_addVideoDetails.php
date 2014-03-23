<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style_admin.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GPERI E-Resource Sharing|Admin|Video Upload</title>
</head>

<body onload="window.getSubjects()">

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
	

	//include('includes/var.php');

	//include('add_videos.php');
	
	//echo $videoDetailCounter;
	
	$name=$_SESSION['names'];
	
	$revCounter=$_SESSION['videoCounter'];
	
	//echo $revCounter;
	
	require_once('functions.js');
	
?>


<script type="text/javascript">
	  		
			/*function getSubjects()
			{
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microdoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					var form = document['form2'];
					var branch = form['branch'].value;
					xmlhttp.open("GET" ,"getSubjects.php?branch=" + branch, true);
					
					xmlhttp.onreadystatechange = function()
					{		
							var s = document.getElementById("subject");	//document.createElement("select");
							s.innerHTML=this.responseText;
					}
					
					xmlhttp.send(null);
				}
			}*/
	   </script>



<form name="form" method="post" action="aGdPmEiRnI_saveVideoDetails.php" enctype="multipart/form-data" >

<div id="cont">

	<div id="sidepanel">
    	<div id="menu">
        	<ul>
            	<li class="currentSel"><a href="#">video upload</a></li>
            </ul>
        </div>
    </div>

	<div id="content">
    	<div class="insidecont">
        
        <div id="vUp">
        
        	<h1 style="font-weight:lighter;"><u>Video: <?php echo $name[$revCounter] ?></u></h1>
        
			<b>Enter Details for Video <font color="#CC0000">(<?php echo $revCounter ?> videos left)</font></b> <br /><br />

			
            *Title: <br />
            <input type="text" name="title" /><br /><br />


            
			Branch: <br />
			<select name="branch" onChange="window.getSubjects()" style="width:150px;">
        
                <option value="computer">Computer</option>
                <option value="mechanical">Mechanical</option>
                <option value="civil">Civil</option>
                <option value="electrical">Electrical</option>
            
       		</select><br /><br />


            
			Subject: <br />
           	<select name="subject" id="subject" style="width:150px;">
        
    		</select><br /><br />


            
			Thumbnail: <br />
            <input type="file" name="thumbnail"/><br /><br />



			Topic: <br />
            <textarea name="topic"></textarea><br /><br />

            
			Description: <br />
            <textarea name="desc"></textarea><br /><br /><br />


            
            <input type="submit" name="upload" value="Save Details" class="submit" />
		</div>
            
        </div>
    </div>

</div>

</form>
</body>
</html>



