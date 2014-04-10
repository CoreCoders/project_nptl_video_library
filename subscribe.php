<?php

	session_start();

	$html=$_GET['html'];
	$id=$_GET['id'];
	$uid=$_SESSION['uid'];

	require_once('connection.php');
	
	$query=('INSERT INTO `db_gperi`.`subscription` (`id`, `uid`, `to`) VALUES (NULL, "'.$uid.'", "'.$id.'")');
			
	$result=mysql_query($query);
			
	mysql_close($conn);
	
	$html=str_replace('subscribeUser(','unsubscribeUser(',$html);
	
	$html=str_replace('value="Subscribe"','value="Unsubscribe"',$html);
	
	$html='<li id="st'.$id.'">'.$html."</li>";
	
	echo $html;
	

?>