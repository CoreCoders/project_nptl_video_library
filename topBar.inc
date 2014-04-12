 <div id="top-bar">
        <div id="title3">
        	
            <h2 style="margin:0px; padding:0px;"><a href="choicePage.php" style="text-decoration:none; color:#FFF;"><img src="img/gperi.png" style="height:42px; width:42px; margin:0px; padding:0px;" />&nbsp;<u>GPERI E-Resource Sharing</u></a><?php
			echo " > ".$_SESSION['branch']." > ".$_SESSION['subject']." > Videos"; 
			 ?></h2>
        </div>
        
        
        
        <div id="userInfo-box">
        
        	<div id="userImg"></div>
            
            <div id="userNm">Welcome,<br><?php echo $uid; ?></div>
            
            <div id="vline" style="float: right; height: 50px; margin-top: -42px; margin-right: 18px;"></div>
            
            <ul id="menu" style="margin: -28px 0px 0px 8px;">
    <li style="margin:-50px 0px 0px 128px; padding:0"><a href="##" onMouseOver="showMenu()" onMouseOut="hideMenu()" style="background:none; padding:0;"><div id="arrow" ></div></a>

        <ul id="sub-menu" onMouseOver="showMenu()" onMouseOut="hideMenu()">
        	 <li>
            	<a href="#" style="width: 130px;" onClick="showUserEditBox()">My Info</a>
            </li>
            <li>
                <a href="#" onClick="loadSubscriptionBoxLeft()" style="width: 130px;">Manage Subscriptions</a>
            </li>  
            <li>
                <a href="javascript:void();" onclick="document.getElementById('underlay').style.display='block'; document.getElementById('lightbox').style.display='block'; document.getElementById('lightbox-inside').style.display='block';" style="width: 130px;">Change Password</a>
            </li>
            <li>
                <a href="tryLogout.php" style="width: 130px;">Logout</a>
            </li>          
        </ul>
    </li>
</ul>   
        
        
        </div>
        
        
        
        <div id="search-box">
            <div id="search-box-cont">
                Search For Videos:&nbsp;&nbsp;
                
                <input type="text" name="searchText"/>
                
            </div>
            
            <input type="submit" value="" id="btn-search2" />
            
        </div>
        
        
        
        
        
    </div>