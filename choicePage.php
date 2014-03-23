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

	session_start();
	
	if(!$_SESSION['uid'])
	{
		session_destroy();
		header("location:index.php");	
	}
	
	require_once('functions.js');

?>


<body onLoad="window.getSubjects()">


<form name="form" action="storeKey.php" method="post">

       
       
       

       


<div class="gridContainer clearfix">




<div id="underlay">
</div>

<div id="lightbox">
        <a style="float:right; margin:5px 5px 0px 0px;" href="javascript:void();" onclick="document.getElementById('underlay').style.display='none'; document.getElementById('lightbox').style.display='none'; clearAll();"><img src="img/close.png"/></a>
        
        
        
        <div id="lightbox-inside" style="text-align:right; margin:8% 16% 0% 15%;">
        
            <h2>Current Password:  <input type="password" name="oldPass" onKeyUp="matchPass()"/></h2><br>
            <h2>New Password:  <input type="password" name="newPass" onKeyUp="matchPass()"/></h2><br>
            <h2>Confirm New Password:  <input type="password" name="conNewPass" onKeyUp="matchPass()"/></h2>
            <input type="button" id="chngPassBtn" name="chngPass" value="Change Password" onClick="changePass()" style="float:right; display:none; margin-top:20px; height:35px; width:150px; color:#FFF; background-color:#006ab8; border:none;"/>
        
		</div>
        
        <div id="changePassResponse" style="text-align:center; margin-top:20%;"></div>

</div>






  
  <div id="title"><h1><img src="img/gperi.png" style="height:70px; width:70px; margin:-10px 0px 0px 0px; padding:0px;" />GPERI E-Resource Sharing</h1></div>
  
  
  
  
  
  
  
  
  
  
  <div id="login-box">
  
  
  
  
  		<div id="userInfo-box">
        
        	<div id="userImg"></div>
            
            <div id="userNm">Welcome,<br><?php echo $_SESSION['uid']; ?></div>
            
            <div id="vline" style="float: right; height: 50px; margin-top: -42px; margin-right: 18px;"></div>
            
            <ul id="menu" style="margin: -28px 0px 0px 8px;">
    <li style="margin:-50px 0px 0px 128px; padding:0"><a href="##" onMouseOver="" style="background:none; padding:0;"><div id="arrow" style="float: right; height: 15px; width: 15px; background-image:url(img/arr.png); margin: 0px 0px 0px 0px;"></div></a>

        <ul class="sub-menu">
            <li>
                <a href="javascript:void();" onclick="document.getElementById('underlay').style.display='block'; document.getElementById('lightbox').style.display='block'; document.getElementById('lightbox-inside').style.display='block';" style="width: 130px;">Change Password</a>
            </li>
            <li>
                <a href="tryLogout.php" style="width: 130px;">Logout</a>
            </li>
        </ul>
    </li>
</ul>   
        
        
        </div>
  
  
  
  
  
  	<div id="login-box-inside">
  	<h2>Select Branch:</h2><br>
	
    <select name="branch" onChange="window.getSubjects()" style="width:150px;">
        
            <option value="computer">Computer</option>
            <option value="mechanical">Mechanical</option>
            <option value="civil">Civil</option>
            <option value="electrical">Electrical</option>
            
       </select>
       
      
    
    
    
    <h2>Select Subject:</h2><br>

	<select name="subject" id="subject" style="width:150px; float:left;">
        
    </select>
    
    <input type="submit" name="go" value="Go>>>" id="btn-search"/>
    
    </div>
    
    <div id="vline"></div>
    
    <div id="title2"><h2>Recent Updates</h2></div>
    
    <div id="recentUpdateCont">
    
    	<marquee scrolldelay="80" scrollamount="2" direction="up" align="top" style=" margin-left:5px;height: 235px" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
        
        
<?php

			require_once('connection.php');
			
			$query="SELECT * FROM videos ORDER BY id DESC LIMIT 10";
			
			$result=mysql_query($query);
			
			mysql_close($conn);
			
			while($row=mysql_fetch_array($result))
			{
			
				
				$title=$row['title'];
				$desc=$row['desc'];
				$date=$row['date'];
				
				echo '<div style="height:90px; width:400px; overflow:hidden; margin-top:20px; margin-bottom:20px;">
            	
				<h3 style="font-size:18px; margin:0px; padding:0px;">',$title,'</h3>
                <p style="text-indent:50px; text-align:justify; margin-left:20px; margin-top:0px; margin-bottom:0px; height:50px; overflow:hidden;">',$desc,'
                </p>
                <h5 style="float:right; margin:2px 0px 0px 0px; padding:0px; color:#FFF;">Uploaded On- ',$date,'</h5>
            	            
            </div>';
				
				
			}

?>
        
        
        	
        
        </marquee>
    	
    </div>
    
  
  </div>
  
  
</div>

</form>

</body>
</html>
