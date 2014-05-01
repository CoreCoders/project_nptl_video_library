<html>

<head>
	<title></title>
    
    
    
      
</head>

<body onLoad="loadIt()">


<script type="text/javascript">
 		//document.createElement('video');document.createElement('audio');document.createElement('track');
		alert("hello");
		function loadIt()
		{
				alert("hello");
				var xx=document.getElementById("abcd");
				xx.innerHTML="<li>Watch Later (<?php echo $_SESSION['wlatercount']; ?>)</li>";
		}
	</script>


	<ul id="abcd">
    	
        
    
    </ul>
	
        
</body>

</html>