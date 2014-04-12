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
<title>GPERI E-Resource Sharing|Favourites</title>
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



	<?php  include('staticComponents.inc');  ?>





<div id="main-container">

   
   
   	<?php  include('topBar.inc');  ?>
   
    
    
    <div id="side-panel">
    <ul>
    	<a href="main_page_videos.php"><li>Videos</li></a>
        <a href="#" class="active-tab"><li>Fovourites</li></a>
        <a href="main_page_recent.php"><li>Recently Viewed</li></a>
        <a href="main_page_wlater.php"><li>Watch Later</li></a>
        <a href="#"><li>My Subscriptions</li></a>
    </ul>
    </div>
    

    
    <div id="video-cont">
    
    
    <ul>
        <div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>
			<?php
			
			$branch=$_SESSION['branch'];
			$subject=$_SESSION['subject'];
			
			require_once('connection.php');
			
			//$query="SELECT * FROM videos WHERE fav='1' AND branch='".$branch."' AND subject='".$subject."'";
			
			$query="SELECT * FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' AND fav='1'";
			
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
			
			
				
			echo'<li><a id=vid'.$id.' href="setRecent.php?id='.$id.'&uid='.$uid.'"><img src="'.$thumbnail.'"></a><a href="##" style="margin-left: 3%"><h3 id=vid'.$id.' onClick="openVideo(this.id)">',$title,'</h3></a><p>',$desc,'</p><div id="vidExtra"><a href="##" title="Add to Favourites" id=',$id,' onClick="setFav(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star1.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Like" id=',$id,' onClick="setLike(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Add to Watch Later" id=',$id,' onClick="setWlater(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;"></div></a></div></li><div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>';
			
            
			
			}
			
			?>
            
            
            
            
        </ul>
    
    
    </div>
    
</div>

</div>

</form>

</body>
</html>