<?php include "header.php";
if(!isset($_SESSION)) {
session_start();
}
?>
<br>
<br>
<center>
<div style="padding-top:30px; padding-right:10%; padding-bottom:10px; width:20%; height:50%; border-style:solid; border-color:black; border-radius:4px;">
<center><font size="4" >
<form style="padding-left:43%;" align="center" action= "otp.php" method= "post" id="myform" >
Name:
<input type="text" name="name" required="required" value="" />
<br>
<br>
Aadhar Number: 
<input type="text" name="aadhar" required="required" value="" />
<br>
<br>
Voter ID:
<input type="text" name="voterid" required="required" value="" />
<br>
<br>
Mobile Number: 
<input type="text" name="mobile" required="required" value="" />
<br>
<br>
<br>
<input style="padding:10px; color:white; font-size:25px; background:red;" type="submit" name="submit" value="Get OTP" />
</form>
</font>
</center>
</div>

<?php include "footer.php" ;?>
