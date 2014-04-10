<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GPERI E-Resource Sharing</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>
<script src="video_gallery_videolb/jquery.js"></script>

</head>

<?php
	
	try
	{
		session_start();
		if(isset($_SESSION['uid']))
		{
			header("location:choicePage.php");	
		}
		else
		{
			session_destroy();
		}
	}
	catch(Exception $e)
	{
		
	}

?>


<body>

       <script type="text/javascript">		
			
			function signUpFun()
			{
				
				var xmlhttp;
				try
				{
					
					xmlhttp = new XMLHttpRequest;

				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				try
				{
					$('#alert').remove();	
				}
				catch(e)
				{
					
				}
				
				if(xmlhttp)
				{
					
					var form = document['form'];
					var mail = form['signUpId'].value;
					form['signUp'].hidden=true;
					xmlhttp.open("GET" ,"mailPass.php?mail=" + mail, true);
	
					var i = document.getElementsByClassName('gridContainer clearfix');

					var d = document.createElement('span');
					
					xmlhttp.onreadystatechange = function()
					{
							var cnt='<div id="alert" style="height:30px; width:600px; float:left; background-color:#FFF; border-radius:0px 0px 15px 15px; margin:-60px 0px 0px 300px ;"><p style="text-align:center; font-size:14px; margin:0; font-weight:700;"><font color="#FF0000" size="+2">*</font>' + this.responseText + '</p></div>';
							
							d.innerHTML = cnt;
							var p = document.getElementById('marker');
							p.appendChild(d);
							form['signUp'].hidden=false;
							form['signUpId'].value="";
							$('#alert').delay(4000).fadeOut(1000);							
							
					}
					
					xmlhttp.send(null);
					
				}			
				
			}
	   </script>
       
       

<form name="form" action="tryLogin.php" method="post">   


<div class="gridContainer clearfix">
  
  <div id="title"><h1><img src="img/gperi.png" style="height:70px; width:70px; margin:-10px 0px 0px 0px; padding:0px;" />GPERI E-Resource Sharing</h1></div>
  
  <div id="login-box" style="width: 600px; margin: 0% 25% 5% 25%; min-width: 600px;">
  
  	<div id="login-box-inside" style="margin: 10% 5% 12% 12%; width:200px;">
  	<h2>Enter GPERI ID:</h2><br>
	
    <input type="text" name="GPERIid"/>
       
      
    
    
    
    <h2>Enter Password:</h2><br>

	<input type="password" name="GPERIpass"/>
    
    <input type="submit" value="Login" id="btn-search"/>
    
    </div>
    
  	 <div id="vline" style="height: 250px ; margin: 8% 2% 0% 0%; background:-webkit-gradient(linear, 0 0, 0 100%, from(#666), to(#666), color-stop(50%, #FFFFFF));background:-moz-linear-gradient(top, #666 0%, #FFFFFF 50%, #FFFFFF 51%, #666 100%);"></div>
     
     
     <div id="signUpCont" style="float:left; height:auto; width:275px; margin-top:10%;"><span style="float:left; margin-bottom:15px; color:#FFF; font-size:24px; width:95%;">Still Not Having GPERI E-Resource Sharing Account?</span><br><br><br>
		<span style="color:#ccc; font-size:10px;">*Enter Your GPERI Mail ID</span>

     <input type="text" name="signUpId" style="margin-bottom:-2px;"/> <font color="#FFFFFF">@gperi.ac.in</font><br>

<input type="button" onClick="signUpFun()" name="signUp" style="margin-top:22px; text-decoration:none; z-index:2;" id="btn-search" value="SignUp"/>

 </div>
 
 </div>
  
  <div id="marker">
  
  </div>
  
</div>

</form>

</body>
</html>
