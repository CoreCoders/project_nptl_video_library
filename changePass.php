<?php
			session_start();

			$nPass=$_GET['nPass'];
			$uid=$_SESSION['uid'];
			$oPass=$_GET['oPass'];
			$cnPass=$_GET['cnPass'];
			
			$nPass=mysql_real_escape_string($nPass);
			$uid==mysql_real_escape_string($uid);
			
			$oPass=md5($oPass);
			$nPass=md5($nPass);
			$cnPass=md5($cnPass);
	
			require_once('connection.php');
			
			if($oPass!="" && $nPass==$cnPass)
			{
				$query="SELECT * FROM users WHERE uid='".$uid."' AND pass='".$oPass."'";
				$result=mysql_query($query);
				
				if(mysql_num_rows($result) > 0)
				{
					$query="UPDATE  `db_gperi`.`users` SET  `pass` =  '$nPass' WHERE  `users`.`uid` ='$uid';";
					
					$result=mysql_query($query);
						
					mysql_close($conn);
					
					echo "<h2>Password Changed Successfully!</h2>";
				
				}
				else
				{
					mysql_close($conn);
					echo "<h2>Sorry, Incorrect Current Password!</h2>";	
				}
			
			}
			else
			{
				echo "<h2>Error!!!</h2>";
			}


?>