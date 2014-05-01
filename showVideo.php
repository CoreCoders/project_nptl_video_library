<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>


	<link rel="stylesheet" href="js/video-js-4.4.3/video-js/video-js.css" />
    <script src="js/video-js-4.4.3/video-js/video.js"></script>
    <script>
  		videojs.options.flash.swf = "http://example.com/path/to/video-js.swf"
	</script>
    
    
    <script type="text/javascript">
 		document.createElement('video');document.createElement('audio');document.createElement('track');
	</script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GPERI E-Resource Sharing|Videos</title>
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
	
	$uid=$_SESSION['uid']; //'rutvik3107031';//$_SESSION['uid'];
	require_once('functions.js');

?>

<body>

<form name="form" action="processSearch.php" method="get" target="_blank">




<div class="gridContainer">



	<?php  include('staticComponents.inc');  ?>




<div id="main-container">

    
    
    <?php  include('topBar.inc');  ?>

    
    
    <div id="side-panel">
    <ul>
    	<a href="main_page_videos.php" class="active-tab"><li>Videos</li></a>
        <a href="main_page_fav.php"><li>Fovourites (<?php echo $_SESSION['favcount']; ?>)</li></a>
        <a href="main_page_recent.php"><li>Recently Viewed</li></a>
        <a href="main_page_wlater.php"><li>Watch Later (<?php echo $_SESSION['wlatercount']; ?>)</li></a>
        <a href="main_page_subscriptions.php"><li>My Subscriptions</li></a>
    </ul>
    </div>
    
    
    
    
    <div id="video-cont">
   
        <div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>
        
        
        <div id="videoBox">
        
        
        <div id="video"> 
    <?php
	
		$id=$_GET['id'];
		$html=null;		
		$likes=0;
		
		
		$topic="";
		
		
		$branch=$_SESSION['branch'];
		$subject=$_SESSION['subject'];
			
		require_once('connection.php');
		
		$query=("SELECT likes FROM videos WHERE `id`=$id;");
		$result=mysql_query($query);
		
		while($row=mysql_fetch_array($result))
		{
			$likes=$row['likes'];
		}		
		
		$query="SELECT * FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE id='".$id."' AND branch='".$branch."' AND subject='".$subject."'";
			
		$result=mysql_query($query);
			
		//mysql_close($conn);
		
		while($row=mysql_fetch_array($result))
			{
			
				
			$id=$row['id'];
			$topic=$row['topic'];
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
			
			$vCount=$row['vcounts'];
			
			if($row['fav']==1)
			{
				$html=1;				
				
			}
			else
			{
				$html=0;		
				
			}
			
            echo '<video id=vid',$id,' class="video-js vjs-default-skin" controls preload="auto" width="640" height="385" poster="',$thumbnail,'" data-setup=\'{"example_option":true}\' autoplay><source src="video_gallery_videolb/',$original,'" type="video/mp4" /></video><h3>',$title,'</h3><div id="vCount" style="float:right; margin:-38px 115px 0px 0px; font-size:18px; color:#CCC;">'.$vCount.'</div><div id="vidExtra" style="height:25px; width: 100px; float:right; margin:-40px 0px 0px 540px; background-color:#333; border-radius:5px;"><a href="##" title="Add to Favourites" id=',$id,' onClick="setFav(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star'.$html.'.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Like" id=',$id,' onClick="setLike(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Add to Watch Later" id=',$id,' onClick="setWlater(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;"></div></a></div><div id="likes" style="float:right; height:25px; width:100px; background-color:#CCC; text-align:center; margin:-20px 5px 0px 0px; font:1em/30px Arial, Helvetica, sans-serif; border-radius:0px 0px 5px 5px; color:#333;">Likes:'.$likes.'</div><p style="color:#CCC; overflow-wrap:break-word; margin-top:50px;">',$desc,'</p><div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>';
			
			}
			
			
			echo "</div>";
			
			echo '<div id="similarVideosBox">';
			
			
			$topic=str_replace(",","%' or topic like '%",$topic);
			$topic="topic like '%".$topic."%'";
			
			$query="SELECT * FROM videos WHERE $topic";
			
			$result=mysql_query($query);
			
			while($row=mysql_fetch_array($result))
			{
				
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
				
				echo '<div id="similarVideoCont"><div id="similarVideo"><a href="##" onClick=""><img src="'.$thumbnail.'"></a></div><a href="##"><h3 onClick="" class="similarVideoTitle">'.$title.'</h3></a><p class="similarVideoDesc">'.$desc.'"</p></div>';	
				
			}
			
			
			
			
			
			echo "</div>";
			
		
			
			
			
	
	?>
    
   
    
    
    </div>
    
        
    </div>
    
    
    
    
    
 	</div>
    </div>
    </form>
    </body>
    </html>