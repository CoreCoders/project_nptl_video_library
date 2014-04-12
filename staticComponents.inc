<div id="black-back" onClick="hideUserEditBox()"></div>

	<div id="subscription-box">
    	
        <span style="float:left; margin-left:1%; font-weight:bold; margin-bottom:4px;">Users</span>
        
        <span style="float:right; padding-right:32%; font-weight:bold; margin-bottom:4px;">Your Subscriptions</span>
    
    	<div id="subscription-left">
        
        	<div class="subscription">
            	<ul id="subscriptionAvailable">
                </ul>                
            </div>
            
        </div>
        
        <div id="subscription-right">
        	
            
            <div class="subscription">
				<ul id="subscribedTo">
                </ul>
            </div>
            
            
        </div>
	
    </div>



    <div id="user-edit-box">
    	<table width="100%" cellpadding="5">
        
            <tr><td><img src="img/userIcon.gif" height="80" width="80"/></td><td><input type="file" style="margin:0 0 0 5%;"/>(Only jpg 500x500 Max:2MB)</td></tr>
            
            <tr><td>First Name:</td><td><input type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" /></td></tr>
    
            <tr><td>Last Name:</td><td><input type="text" name="lname" value="<?php echo $_SESSION['lname']; ?>" /></td></tr>
            
            <tr><td>About You:</td><td><textarea name="abt" style="width:147px;"><?php echo $_SESSION['abt']; ?></textarea></td></tr>
    
            <tr><td>Contact:</td><td><input type="text" name="cnt" value="<?php echo $_SESSION['cnt']; ?>"/></td></tr>
    
            <tr><td>Email:</td><td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"/></td></tr>
    
            <tr><td colspan="2" align="right"><input type="button" class="myBtn" value="Save Changes" onClick="saveUserInfo()"/></td></tr>

        
        </table>
        
        
   	</div>



<div id="underlay">
</div>

<div id="lightbox">
        <a style="float:right; margin:5px 5px 0px 0px;" href="javascript:void();" onclick="document.getElementById('underlay').style.display='none'; document.getElementById('lightbox').style.display='none'; clearAll();"><img src="img/close.png"/></a>
        
        
        
        <div id="lightbox-inside" style="text-align:right; margin:8% 16% 0% 15%;">
        
            <h2>Current Password:  <input type="password" name="oldPass" onKeyUp="matchPass()"/></h2><br>
            <h2>New Password:  <input type="password" name="newPass" onKeyUp="matchPass()"/></h2><br>
            <h2>Confirm New Password:  <input type="password" name="conNewPass" onKeyUp="matchPass()"/></h2>
            <input type="button" id="chngPassBtn" name="chngPass" value="Change Password" onClick="changePass()" style="float:right; display:none; margin-top:20px; height:35px; width:150px; color:#FFF; background-color:#006ab8; border:none;"/>
        
		</div>
        
        <div id="changePassResponse" style="text-align:center; margin-top:20%;"></div>

</div>