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
<title>GPERI E-Resource Sharing|Recent</title>
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
</head>

<?php

	session_start();
	
	if(!$_SESSION['uid'])
	{
		session_destroy();
		header("location:index.php");	
	}
	if(!$_SESSION['branch'] AND !$_SESSION['subject'])
	{
		header("location:choicePage.php");	
	}
	
	$uid=$_SESSION['uid'];
	require_once('functions.js');
	

?>

<body>

<form name="form" action="processSearch.php" method="post" target="_blank">

<div class="gridContainer">



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














<div id="main-container">

    <div id="top-bar">
        <div id="title3">
            <h2 style="margin:0px; padding:0px;"><a href="choicePage.php" style="text-decoration:none; color:#FFF;"><img src="img/gperi.png" style="height:42px; width:42px; margin:0px; padding:0px;" />&nbsp;<u>GPERI E-Resource Sharing</u></a><?php 
			echo " > ".$_SESSION['branch']." > ".$_SESSION['subject']." > Videos"; 
			 ?></h2>
        </div>
        
        
        
        
        
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
        
        
        
        
        
        
        
        <div id="search-box">
            <div id="search-box-cont">
                Search For Videos:&nbsp;&nbsp;
                
                <input type="text" name="searchText"/>
                
            </div>
            
            <input type="submit" value="" id="btn-search2" />
            
        </div>
    </div>
    
    
    <div id="side-panel">
    <ul>
    	<a href="main_page_videos.php"><li>Videos</li></a>
        <a href="main_page_fav.php"><li>Fovourites</li></a>
        <a href="#" class="active-tab"><li>Recently Viewed</li></a>
        <a href="main_page_wlater.php"><li>Watch Later</li></a>
        <a href="#"><li>My Subscriptions</li></a>
    </ul>
    </div>
    
    


	    <div id="video-cont">
        
        <div id="rec-bar">
        
        	<ul>
            	<li><a href="">My</a></li>
                <li><a href="">Friends</a></li>
                <li><a href="">Teachers</a></li>
            </ul>
        
        </div>
    
    
    <ul>
        <div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>
			<?php
			
			$branch=$_SESSION['branch'];
			$subject=$_SESSION['subject'];
			
			require_once('connection.php');
			
			//$query="SELECT * FROM videos WHERE lvdate NOT LIKE  '0000-00-00 00:00:00' AND branch='".$branch."' AND subject='".$subject."' ORDER BY lvdate DESC LIMIT 50";
			
			$query="SELECT * FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' AND lvdate NOT LIKE  '0000-00-00 00:00:00' ORDER BY lvdate DESC LIMIT 50";
			
			
			$result=mysql_query($query);
			
			mysql_close($conn);
			
			while($row=mysql_fetch_array($result))
			{
			
				
			$id=$row['id'];
			
			$original=$row['path'];
			$thumbnail=$row['thumbnail'];
			if($row['title']!="")
			{
				$title=$row['title'];
			}
			else
			{
				$title=$row['name'];
			}
			$desc=$row['desc'];
			
			
			if($row['fav']==1)
			{
				$html=1;	
			}
			else
			{
				$html=0;	
			}
			
			
				echo'<li><a id=vid'.$id.' href="setRecent.php?id='.$id.'&uid='.$uid.'"><img src="'.$thumbnail.'"></a><a href="##" style="margin-left: 3%"><h3 id=vid'.$id.' onClick="openVideo(this.id)">',$title,'</h3></a><p>',$desc,'</p><div id="vidExtra"><a href="##" title="Add to Favourites" id=',$id,' onClick="setFav(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star'.$html.'.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Like" id=',$id,' onClick="setLike(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Add to Watch Later" id=',$id,' onClick="setWlater(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;"></div></a></div></li><div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>';
            
			
            
			
			}
			
			?>
            
            
        </ul>
        
    
    </div>




   
</div> 

</div>

</form>

</body>
</html>