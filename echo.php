<?php

	//echo date('Y-m-d H:i:s');
	
	$res="<li><a id=vid$id href=\"setRecent.php?id=$id&uid=$uid\"><img src=$thumbnail></a><a href=\"setRecent.php?id=$id&uid=$uid\" style=\"margin-left: 26px;\"><h3 id=vid$id>$title</h3></a><p>$desc</p><div id=\"vidExtra\"><a href=\"##\" title=\"Add to Favourites\" id=$id onClick=\"setFav(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:6px; background-image:url(img/star$html.png);background-repeat:no-repeat;background-size:20px;\"></div></a><a href=\"##\" title=\"Like\" id=$id onClick=\"setLike(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-right:6px; margin-left:8px; background-image:url(img/like.png);background-repeat:no-repeat;background-size:20px;\"></div></a><a href=\"##\" title=\"Add to Watch Later\" id=$id onClick\"setWlater(this.id)\"><div style=\"height:20px;width:20px;float:left;border:none;margin-top:2px; margin-left:6px; background-image:url(img/wlater.png);background-repeat:no-repeat;background-size:20px;\"></div></a></div></li><div id=\"ftr\" style=\"margin-bottom: 2%; margin-top:2%; background: -webkit-gradient(linear, 0 0, 100% 0, from(#666), to(#666), color-stop(50%, #c6c6c6));\"></div>";
	
	echo $res;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//2014-03-23 15:59:17
	
?>