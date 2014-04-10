<?php
	
	session_start();

	$html=null;
	$uid=$_SESSION['uid'];

	require_once('connection.php');
	
	$query='SELECT * FROM `users` WHERE `uid` <> "'.$uid.'"';
			
	$result=mysql_query($query);
			
	mysql_close($conn);
			
	while($row=mysql_fetch_array($result))
	{
		$img=$row['pic'];
		$h3=$row['uid'];
		$p=$row['abt'];
		$id=$row['id'];
		
		$html= $html.'<li id="sa'.$id.'"><img src="'.$img.'"><h3>'.$h3.'</h3><p>'.$p.'</p><input type="button" value="Subscribe" id="'.$id.'" onClick="subscribeUser('.$id.')" class="subscribe-btn"/></li>';
		
	}
	
	echo $html;


?>