<?php
	
	session_start();

	$html=null;
	$iduid=$_SESSION['iduid'];
	$list="";
	$flag=$_GET['flag'];

	require_once('connection.php');
	
	if($flag==0)
	{
		
		$html="";
	
		$query='SELECT * FROM `subscription` WHERE `uid` = "'.$iduid.'"';
				
		$result=mysql_query($query);
				
		if(mysql_num_rows($result) > 0)
		{
		
			while($row=mysql_fetch_array($result))
			{
				$list=$list.'"'.$row['to'].'",';
				
			}
			
			$list=rtrim($list,',');
			
			$query="SELECT * FROM `users` WHERE `id` NOT IN ($list) AND `id` <> $iduid ";
		}
		else
		{
			$query="SELECT * FROM `users` WHERE `id` <> $iduid ";
		}
		
		
				
		$result=mysql_query($query);
				
		while($row=mysql_fetch_array($result))
		{
			$img=$row['pic'];
			$h3=$row['uid'];
			$p=$row['abt'];
			$id=$row['id'];
			
			$html= $html.'<li id="sa'.$id.'"><img src="'.$img.'"><h3>'.$h3.'</h3><p>'.$p.'</p><input type="button" value="Subscribe" id="'.$id.'" onClick="subscribeUser('.$id.')" class="subscribe-btn"/></li>';
			
		}
	
	}
	
	if($flag==1)
	{
		$html="";
		
		$query='SELECT * FROM `subscription` WHERE `uid` = "'.$iduid.'"';
				
		$result=mysql_query($query);
				
		if(mysql_num_rows($result) > 0)
		{
		
			while($row=mysql_fetch_array($result))
			{
				$list=$list.'"'.$row['to'].'",';
				
			}
		
		
			$list=rtrim($list,',');
		
		

		
			$query="SELECT * FROM `users` WHERE `id` IN ($list) AND `id` <> $iduid";
					
			$result=mysql_query($query);
					
			while($row=mysql_fetch_array($result))
			{
				$img=$row['pic'];
				$h3=$row['uid'];
				$p=$row['abt'];
				$id=$row['id'];
				
				$html= $html.'<li id="st'.$id.'"><img src="'.$img.'"><h3>'.$h3.'</h3><p>'.$p.'</p><input type="button" value="Unsubscribe" id="'.$id.'" onClick="unsubscribeUser('.$id.')" class="subscribe-btn"/></li>';
				
			}	
		}
	}
	
	mysql_close($conn);	
	
	echo $html;


?>