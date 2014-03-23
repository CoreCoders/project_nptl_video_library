<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style_admin.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GPERI E-Resource Sharing|Admin|Login</title>
</head>

<?php

	session_start();

	session_destroy();

?>


<body>

<form method="post" action="aGdPmEiRnI.php" enctype="multipart/form-data" >
<div id="cont">

	<div id="sidepanel">
    	<div id="menu">
        	<ul>
            	<li class="currentSel" style="color:#FFF; text-decoration:none;">GPERI E-Resource Sharing|Admin|Login</li><br />
                <span style="margin:15px; color:#FFF;">ID:</span><br />
				<input type="text" name="adminID" style="margin:5px 15px 15px 15px;"/><br />
				<span style="margin:15px; color:#FFF;">Password:</span><br />
                <input type="password" name="adminPass" style="margin:5px 15px 15px 15px;"/><br />
                
                <input type="submit" name="sbmt" value="Login" style="float:right; margin-right:25px; padding:5px 12px 5px 12px;"
                
            </ul>
        </div>
    </div>

	<div id="content">
    	<div class="insidecont">
        
        
            
        </div>
    </div>

</div>

</form>
</body>
</html>