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
<body>

<?php

			session_start();
			
			if(!$_SESSION['uid'])
			{
				session_destroy();
				header("location:index.php");	
			}
			
			if(isset($_POST['searchText']))
			{
				$keyword=$_POST['searchText'];	

			}
			else
			{
				$keyword="";
			}
			
			$counter=0;
			
			
			
			require_once('connection.php');
			
			//$query="SELECT * FROM `videos` WHERE `subject`='".$_SESSION['subject']."' AND `branch`='".$_SESSION['branch']."' AND `title` LIKE '%".$keyword."%' OR `desc` LIKE '%".$keyword."%' OR `topic` LIKE '%".$keyword."'";
			
			require_once('functions.js');
			
			$uid=$_SESSION['uid'];
			
			echo $_SESSION['subject'];
			echo $_SESSION['branch'];
			
			$query= "SELECT * FROM `videos` LEFT JOIN `$uid` ON `videos`.`id` = `$uid`.`vid` WHERE `branch`='".$_SESSION['branch']."' AND `subject`='".$_SESSION['subject']."' AND `title` LIKE '%".$keyword."%' OR `desc` LIKE '%".$keyword."%' OR `topic` LIKE '%".$keyword."'";
			
			$result=mysql_query($query);
			
			mysql_close($conn);
			
			$counter=mysql_num_rows($result);			

?>



<div class="gridContainer">

<div id="main-container">

	<h1>Search Results (<?php echo $counter ?>)</h1>

    <div id="video-cont" style="background-color:#CCC;">
        
        
        <ul>
        <div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 200% 0, from(#666), to(#ccc), color-stop(40%, #ccc));"></div>
			<?php
			
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
			
			
				echo'<li><a id=vid'.$id.' href="setRecent.php?id='.$id.'&uid='.$uid.'"><img src="'.$thumbnail.'"></a><a href="##" style="margin-left: 3%"><h3 id=vid'.$id.' onClick="openVideo(this.id)">',$title,'</h3></a><p>',$desc,'</p><div id="vidExtra" style="background-color:#666;"><a href="##" title="Add to Favourites" id=',$id,' onClick="setFav(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star'.$html.'.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Like" id=',$id,' onClick="setLike(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;"></div></a><a href="##" title="Add to Watch Later" id=',$id,' onClick="setWlater(this.id,\''.$uid.'\')"><div style="height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;"></div></a></div></li><div id="ftr" style="margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));"></div>';
            
			
            
			
			}
			
			?>
            
            
            
            
        </ul>
        
    
    </div>
   
   
</div> 

</div>

</body>
</html>

