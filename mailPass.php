<?php
	
	require_once('connection.php');

	$mail=$_GET['mail'];
	
	if($mail!="")
	{
		
		$query=("SELECT * FROM  `users` WHERE `uid` LIKE '$mail'");
		
		$result=mysql_query($query);		
		
		if(mysql_num_rows($result) > 0)
		{
		
			mysql_close($conn);
			echo "Account Already Exist For This ID";
		
		}
		else
		{
		
			
			
			function random_string()
			{
				$character_set_array = array();
				$character_set_array[] = array('count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz');
				$character_set_array[] = array('count' => 1, 'characters' => '0123456789');
				$temp_array = array();
				
				foreach ($character_set_array as $character_set)
				{
					for ($i = 0; $i < $character_set['count']; $i++)
					{
						$temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
					}
				}
				
				shuffle($temp_array);
				return implode('', $temp_array);
				
			}
	
		   $pass=random_string();
		
		   $to = "$mail@gperi.ac.in";
		   $subject = "GPERI E-Resource Sharing Account Password";
		   $message = "GPERI E-Resource Sharing Account Details. \n\n\n\n ID: $mail \n Password: $pass";
		   $header = "";
		   $retval = mail ($to,$subject,$message,$header);
		   
		   if( $retval == true )  
		   {
		   
		   $pass=md5($pass);
		
			$query=("INSERT INTO  `db_gperi`.`users` (`id` ,`uid` ,`pass` ,`email` ,`activation` ,`status`) VALUES (NULL ,  '$mail',  '$pass', '$to', '0', '0')");
			
			$result=mysql_query($query);
			
			mysql_close($conn);
		   
		  echo '<font color="#00CC00">Mail Sent Successfully, Check Your Mail For Password!</font>';
			 }
			else
			{
				echo '<font color="#FF0000">Sorry, Mail Could Not Be Sent(Error!)</font>';
			}
	   
		}
	}
	else
	{
			echo "Please Enter A Valid GPERI Mail ID";
	}

?>