<?php include "header.php";
if(!isset($_SESSION)) { 
session_start();
}

    #### 2Factor API Setting
    $APIKey='5700f938-f292-11eb-8089-0200cd936042';
    
    #### Custom Logic
    $otpValue=(( isset($_REQUEST['otp']) AND $_REQUEST['otp']<>'' ) ? $_REQUEST['otp'] : '' );
    
    if ( $otpValue <> '') ### OTP value entered by user
    {
        ### Check if OTP is matching or not
        $VerificationSessionId = $_REQUEST['VerificationSessionId'];
        $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/VERIFY/$VerificationSessionId/$otpValue"),false);
        $VerificationStatus= $API_Response_json->Details;
		
		if ( $VerificationStatus!='OTP Matched'){
                
			echo "<script type='text/javascript'>alert('Sorry, OTP entered was incorrect. Please enter correct OTP');</script>";
			die();
		}
			
    }

?>

<center><h1 style="color:blue;">CAST YOUR VOTE</h1></center>
<br>
<center>
<div style="padding-top:30px; padding-right:10%; padding-bottom:30px; width:20%; height:50%; border-style:solid; border-color:black; border-radius:4px;">
<form style="padding-left:43%;" action="final.php" name="vote" method="post" id="myform" >
<center><font size='5'>
<input type="radio" name="party" value="DMK">DMK<BR>
<input type="radio" name="party" value="ADMK">ADMK<BR>
<input type="radio" name="party" value="BJP">BJP<BR>
<input type="radio" name="party" value="CONGRESS">CONGRESS<BR>
<input type="radio" name="party" value="NOTA">NOTA<BR>
</font></center><br>
<center>
<input type="submit" value="Submit Vote" name="submit" style="height:30px; padding:5px; color:white; background:red; width:100px" /></center>
</form>
</div>
</center>

<?php include "footer.php" ;?>
