<script type="text/javascript">

			
			
			
			
			
			function  showMenu()
			{
				document.getElementById("sub-menu").style.display='block';	
			}
			
			function  hideMenu()
			{
				document.getElementById("sub-menu").style.display='none';	
			}
			
			function showSubscriptionBox()
			{
					
			}
			
			function hideUserEditBox()
			{
				document.getElementById("black-back").style.display='none';
				document.getElementById("user-edit-box").style.display='none';
				document.getElementById("subscription-box").style.display='none';
			}
			
			function showUserEditBox()
			{
				document.getElementById("black-back").style.display='block';
				document.getElementById("user-edit-box").style.display='block';
			}
			

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
			
			
			function chkMail(x)
			{
				var pattern="^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[\\w]$";
				var regex=new RegExp(pattern);
				if(regex.test(x))
				{
					return true;
				}
				else
				{
					alert("Invalid Email");
				}
				
			}
			
			function chkString(x)
			{
				var regexp=new RegExp("[a-zA-Z]");
				if(regexp.test(x))
				{
					return true;
				}
				else
				{
					alert("Name and Last name must contain string");
				}	
			}
			
			function chkNumber(x)
			{
				if(isNaN(x)==false && x!="")
				{
					return true;
				}
				else
				{
					alert("Invalid Contact Number");
				}
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
			
			function loadSubscriptionBoxLeft()
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
									
						xmlhttp.open("GET" ,"loadSubscription.php?flag=0");
						
						xmlhttp.onreadystatechange = function()
						{		
								
							document.getElementById("subscriptionAvailable").innerHTML=this.responseText;
							
							loadSubscriptionBoxRight();
							
							//document.getElementById("black-back").style.display='block';
							//document.getElementById("subscription-box").style.display='block';
							
								
						}
						
						xmlhttp.send(null);
				}
			}
			
			
			function loadSubscriptionBoxRight()
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
									
						xmlhttp.open("GET" ,"loadSubscription.php?flag=1");
						
						xmlhttp.onreadystatechange = function()
						{		
								
							document.getElementById("subscribedTo").innerHTML=this.responseText;
							
							document.getElementById("black-back").style.display='block';
							document.getElementById("subscription-box").style.display='block';
							
								
						}
						
						xmlhttp.send(null);
				}
			}
			
			
			function subscribeUser(id)
			{
				var x="sa"+id;
				
				var res="";
				
				var html=document.getElementById(x).innerHTML;				
				
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
									
						xmlhttp.open("GET" ,"subscribe.php?id="+id+"&html="+html);
						
						xmlhttp.onreadystatechange = function()
						{		
						
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
							{
								
							//alert(this.responseText);
							res=this.responseText;
							
							
							document.getElementById("subscribedTo").innerHTML +=res;
							
							document.getElementById(x).remove();
							
							//document.getElementById("black-back").style.display='block';
							//document.getElementById("subscription-box").style.display='block';
							}
							
								
						}
						
						
						
						xmlhttp.send(null);
				}				
			}
			
			
			function unsubscribeUser(id)
			{
				
				var x="st"+id;
				
				var res="";
				
				var html=document.getElementById(x).innerHTML;				
				
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
									
						xmlhttp.open("GET" ,"unsubscribe.php?id="+id+"&html="+html);
						
						xmlhttp.onreadystatechange = function()
						{		
						
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
							{
								
							//alert(this.responseText);
							res=this.responseText;
							
							
							document.getElementById("subscriptionAvailable").innerHTML +=res;
							
							document.getElementById(x).remove();
							
							//document.getElementById("black-back").style.display='block';
							//document.getElementById("subscription-box").style.display='block';
							}
							
								
						}
						
						xmlhttp.send(null);
				}				
			}
			
			
	   		function saveUserInfo()
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
					var fname = form['fname'].value;
					var lname = form['lname'].value;
					var abt = form['abt'].value;
					var cnt = form['cnt'].value;
					var email= form['email'].value;
					
					if(chkMail(email)==true && chkNumber(cnt)==true && chkString(fname)==true && chkString(lname)==true)
					{
					
						xmlhttp.open("GET" ,"saveUserInfo.php?fname=" + fname + "&lname=" + lname + "&abt=" + abt + "&cnt=" + cnt + "&email" + email , true);
						
						xmlhttp.onreadystatechange = function()
						{		
								
								hideUserEditBox();
								
						}
						
						xmlhttp.send(null);
					}
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
			
			

	  		
			function setFav(id_no)
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
					//var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setFav.php?id=" + id , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							var s=document.getElementById(id);
							var n=document.getElementById("notification");
							s.innerHTML=this.responseText;
							n.innerHTML="Added To Favourites";
					}
					
					xmlhttp.send(null);
				}
			}
			
			
			function setLike(id_no)
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
					//var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setLike.php?id=" + id , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							
							
							try
							{
								document.getElementById("notification").innerHTML="Liked Successfully";
								document.getElementById("likes").innerHTML=this.responseText;	
							}
							catch(e)
							{
								document.getElementById("likes").innerHTML=this.responseText;
							}
							
							
							
							
							
					}
					
					xmlhttp.send(null);
				}	
				
			}
			
			
			function setWlater(id_no)
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
					//var uid=u_id;
					//alert(uid);
					//var form = document['form3'];
					//var branch = form['branch'].value;
					xmlhttp.open("POST" ,"setWlater.php?id=" + id , false);
					
					xmlhttp.onreadystatechange = function()
					{		
							//var s = document.getElementById("subject");
							//document.createElement("select");
							//alert(this.responseText);
							//var s=document.getElementById("likes");
							//s.innerHTML=this.responseText;
							var n=document.getElementById("notification");
							n.innerHTML="Added To Watch Later";
														
					}	
									
					xmlhttp.send(null);
				}				
			}
			
			
			function loadMore()
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
					var div = document.getElementById("display-video-list");
					xmlhttp.open("GET" ,"loadMore.php", true);
					
					xmlhttp.onreadystatechange = function()
					{		
							var s = document.getElementById("display-video-list");
							s.innerHTML=this.responseText;
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
			
			
			
			function loadVideos()
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
					alert("hello");
					
					xmlhttp.open("GET" ,"loadVideos.php", true);
					
					xmlhttp.onreadystatechange = function()
					{		
					
							if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
							{
								
							//alert(this.responseText);
							res=this.responseText;
							
							alert(res);
							
							
							document.getElementById("display-video-list").innerHTML +=res;
							
							//document.getElementById(x).remove();
							
							//document.getElementById("black-back").style.display='block';
							//document.getElementById("subscription-box").style.display='block';
							}
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