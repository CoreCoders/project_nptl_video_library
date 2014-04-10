<?php
			session_start();

			$uid=$_SESSION['uid'];
			
			$_SESSION['fname']=$fname=$_GET['fname'];
			$_SESSION['lname']=$lname=$_GET['lname'];
			$_SESSION['abt']=$abt=$_GET['abt'];
			$_SESSION['cnt']=$cnt=$_GET['cnt'];
			$_SESSION['email']=$email=$_GET['email'];
			
			
			require_once('connection.php');
			
			$query="UPDATE  `db_gperi`.`users` SET  `fname` =  '$fname', `lname` = '$lname', `abt` = '$abt', `cnt` = '$cnt' WHERE  `users`.`uid` ='$uid';";					
			$result=mysql_query($query);						
			
			mysql_close($conn);


?>