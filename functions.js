
<script type="text/javascript">



			function clearAll()
			{
				var form = document['form'];
				form['newPass'].value="";
				form['conNewPass'].value="";
				form['oldPass'].value="";
				var s = document.getElementById("changePassResponse");
				s.innerHTML="";
				document.getElementById('chngPassBtn').style.display='none';
			}
			
	   
	   		
			function matchPass()
			{
				
				var form = document['form'];
				var nPass = form['newPass'].value;
				var cnPass = form['conNewPass'].value;
				var oldPass = form['oldPass'].value;
				
				if(nPass==cnPass && nPass!="" && cnPass!="" && oldPass!="")
				{
					document.getElementById('chngPassBtn').style.display='block';	
				}
				else
				{
					document.getElementById('chngPassBtn').style.display='none';		
				}
				
			}
	   
	   
	   
	   		function changePass()
			{
				
			
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					var form = document['form'];
					var oPass = form['oldPass'].value;
					var nPass = form['newPass'].value;
					var cnPass = form['conNewPass'].value;
					
					xmlhttp.open("GET" ,"changePass.php?oPass=" + oPass + "&nPass=" + nPass + "&cnPass=" + cnPass , true);
					
					xmlhttp.onreadystatechange = function()
					{		
							
							document.getElementById('lightbox-inside').style.display='none';
							
							
							
							var s = document.getElementById("changePassResponse")	//document.createElement("select");
							//alert(this.responseText);
							s.innerHTML="";
							s.innerHTML=this.responseText;
							
							//$('#changePassResponse').delay(3000).fadeOut(1000);
							
					}
					
					xmlhttp.send(null);
				}
				
				//document.getElementById('lightbox').style.display='none';
				//document.getElementById('underlay').style.display='none';
				
				//$('#lightbox').delay(6000).css('display','none');
			}
			
			

	  		
			function setFav(id_no,u_id)
			{
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					//alert(id_no);
					var id=id_no;
					var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setFav.php?id=" + id + "&uid=" + uid , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							var s=document.getElementById(id);
							s.innerHTML=this.responseText;
					}
					
					xmlhttp.send(null);
				}
			}
			
			
			function setLike(id_no,u_id)
			{
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					//alert(id_no);
					var id=id_no;
					var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setLike.php?id=" + id + "&uid=" + uid , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							var s=document.getElementById("likes");
							s.innerHTML=this.responseText;
					}
					
					xmlhttp.send(null);
				}	
				
			}
			
			
			function setWlater(id_no,u_id)
			{
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					//alert(id_no);
					var id=id_no;
					var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setWlater.php?id=" + id + "&uid=" + uid , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							//var s=document.getElementById("likes");
							//s.innerHTML=this.responseText;
					}
					
					xmlhttp.send(null);
				}	
				
			}
			
			
			
			function getSubjects()
			{
				var xmlhttp;
				try
				{
					xmlhttp = new XMLHttpRequest;
				}
				catch(e)
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xmlhttp)
				{
					var form = document['form'];
					var branch = form['branch'].value;
					xmlhttp.open("GET" ,"getSubjects.php?branch=" + branch, true);
					
					xmlhttp.onreadystatechange = function()
					{		
							var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							s.innerHTML=this.responseText;
					}
					
					xmlhttp.send(null);
				}
			}
			
			
			
			
			
			
			
			function openVideo(id)
			{
				var vid=id.replace("vid","");
				window.location.href="showVideo.php?id="+vid;
				
			}
			
			
			
	   </script>