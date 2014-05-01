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
	$iduid=$_SESSION['iduid'];
	require_once('functions.js');
?>

<body>

<form name="form" action="processSearch.php" method="post" target="_blank">




<div class="gridContainer">








<?php   include('staticComponents.inc');     ?>








<div id="main-container">

	<div id="notification">
    	
    </div>


   
    
    <?php   include('topBar.inc');     ?>
    
    
    <?php
	
		$branch=$_SESSION['branch'];
		$subject=$_SESSION['subject'];
	
		require_once('connection.php');
	
		$query="SELECT id FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' AND fav='1'";
			
		$result=mysql_query($query);
		
		$favcount=0;
		
		while($row=mysql_fetch_array($result))
		{
			$favcount=$favcount+1;	
		}
		
		$query="SELECT id FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' AND wlater='1'";
			
		$result=mysql_query($query);
		
		$wlatercount=0;
		
		while($row=mysql_fetch_array($result))
		{
			$wlatercount=$wlatercount+1;	
		}
		
		$_SESSION['favcount']=$favcount;
		$_SESSION['wlatercount']=$wlatercount;
	
	?>
	

    
    
    <div id="side-panel">
    <ul>
    	<a href="main_page_videos.php"><li>Videos</li></a>
        <a href="main_page_fav.php" id="fav"><li>Fovourites (<?php echo $_SESSION['favcount']; ?>)</li></a>
        <a href="main_page_recent.php"><li>Recently Viewed</li></a>
        <a href="main_page_wlater.php" id="wlater"><li>Watch Later (<?php echo $_SESSION['wlatercount']; ?>)</li></a>
        <a href="#" class="active-tab"><li>My Subscriptions</li></a>
    </ul>
    </div>
    
    
    
    <div id="video-cont">
        
        <div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>
        
        <ul id="display-video-list">
        
        
        	
        
        
			<?php
			
			
			
			$html=null;
			
			//$query="SELECT * FROM videos WHERE branch='".$branch."' AND subject='".$subject."'";
			
			$query="SELECT `to` FROM `subscription` WHERE `uid`=$iduid";
			
			//$query="SELECT * FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' LIMIT 0,10";
			
			$result=mysql_query($query);
			
			//mysql_close($conn);
			
			while($row=mysql_fetch_array($result))
			{
			
				
				$to=$row['to'];
				
				$query="SELECT `uid` FROM `users` WHERE `id`=$to";
				
				$result=mysql_query($query);
				
				while($row=mysql_fetch_array($result))
				{
					
					$toid=$row['uid'];
					
					$query="SELECT * FROM VIDEOS LEFT JOIN `$toid` ON VIDEOS.ID = `$toid`.VID WHERE branch='".$branch."' AND subject='".$subject."' AND fav=1 OR lflag=1 ";
					
					$result=mysql_query($query);
				
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
							$html=$toid." Added to Favourites";	
						}
						if($row['lflag']==1 )
						{
							$html=$toid." Liked It";	
						}						
						if($row['fav']==1 && $row['lflag']==1 )
						{
							$html=$toid." Liked and Added to Favourites";	
						}
						
				
				
					echo'<li><a id=vid'.$id.' href="setRecent.php?id='.$id.'&uid='.$uid.'"><img src="'.$thumbnail.'"></a><a href="setRecent.php?id='.$id.'&uid='.$uid.'" style="margin-left: 26px;"><h3 id=vid'.$id.'>',$title,'</h3></a><p>',$desc,'</p><div id="vidExtra" style="text-decoration:underline; color:#FFF; width:400px; margin: 104px 0px 0px 215px;">'.$html.'</div></li><div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>';
				
			
					}
				}
			}
			
			
			?>
            
            
        </ul>
        
        <a href="" style="float:right; margin:0% 50% 1% 0%; text-decoration:none; color:#CCC; ">Load More</a>
    
    </div>
   
   
   		
    
   
</div> 

</div>

        

</form>

</body>
</html>