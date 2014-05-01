<?php

	//echo "hello";


	session_start();
	
	/*$_SESSION['loadMoreCounter']=$_SESSION['loadMoreCounter']+1;*/
	
	$uid=$_SESSION['uid'];
	
	$branch=$_SESSION['branch'];
	$subject=$_SESSION['subject'];
	
	/*$toCount=$_SESSION['loadMoreCounter']*10;
	
	$fromCount=$toCount-9;*/
	
	$res="";
	
	require_once('connection.php');
	
	$html=null;
			
			//$query="SELECT * FROM videos WHERE branch='".$branch."' AND subject='".$subject."'";
			
			$query="SELECT * FROM VIDEOS LEFT JOIN `$uid` ON VIDEOS.ID = `$uid`.VID WHERE branch='".$branch."' AND subject='".$subject."' ORDER BY id ASC LIMIT 11 , 20";
			
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
			
			
				$res=$res."<li><a id=vid$id href=\"setRecent.php?id=$id&uid=$uid\"><img src=\"$thumbnail\"></a><a href=\"setRecent.php?id=$id&uid=$uid\" style=\"margin-left: 26px;\"><h3 id=vid$id>$title</h3></a><p>$desc</p><div id=\"vidExtra\"><a href=\"##\" title=\"Add to Favourites\" id=$id onClick=\"setFav(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star$html.png);background-repeat:no-repeat;background-size:20px;\"></div></a><a href=\"##\" title=\"Like\" id=$id onClick=\"setLike(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;\"></div></a><a href=\"##\" title=\"Add to Watch Later\" id=$id onClick=\"setWlater(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;\"></div></a></div></li><div id=\"ftr\" style=\"margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));\"></div>";
            
			
			}
			
			echo $res;


?>