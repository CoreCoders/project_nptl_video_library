<?php

	session_start();

	$html=$_GET['html'];
	$id=$_GET['id'];
	$uid=$_SESSION['uid'];

	require_once('connection.php');
	
	$query=('DELETE FROM `subscription` WHERE `uid`="'.$uid.'" AND `to`="'.$id.'"');
			
	$result=mysql_query($query);
			
	mysql_close($conn);
	
	$html=str_replace('unsubscribeUser(','subscribeUser(',$html);
	
	$html=str_replace('value="Unsubscribe"','value="Subscribe"',$html);
	
	$html='<li id="sa'.$id.'">'.$html."</li>";
	
	echo $html;

?>