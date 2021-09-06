<?php include "header.php";?>
<?php
include "connection.php";
if(!isset($_SESSION)) {
session_start();
}
$name = $_POST['name'];
$aadhar = $_POST['aadhar'];
$voterid = $_POST['voterid'];
$mobile = $_POST['mobile'];

$s = "SELECT * FROM voters WHERE aadhar = '$aadhar'";
$result = $con->query($s);

if($result->num_rows > 0){
	echo "<script type='text/javascript'>alert('You Have already Voted.No need to vote again.'); window.history.back();</script>";
	die();
}
else{
	

$sql = "INSERT INTO voters(name,aadhar,voterid,mobile) VALUES('$name','$aadhar','$voterid','$mobile')";
$con->query($sql);

$_SESSION['SESS_ID'] = $aadhar;

    #### 2Factor API Setting
    $APIKey='5700f938-f292-11eb-8089-0200cd936042';
    $OTPMessage="<p>We have sent an OTP to $mobile,<br>Please enter the same below</p>";
    
    #### Custom Logic
    $otpValue=(( isset($_REQUEST['otp']) AND $_REQUEST['otp']<>'' ) ? $_REQUEST['otp'] : '' );
    
    if ( $otpValue =='' AND $mobile=="")
    {
        echo "<script type='text/javascript'> window.history.back(); </script>";
        die();
    }
    if ( ( $mobile =='' OR strlen($mobile) <>10 OR substr($mobile,0,2) < 60))
    {
        echo "<script type='text/javascript'> alert('Please enter valid mobile number');window.history.back(); </script>";
        die();
    }
    if ( $otpValue <> '') ### OTP value entered by user
    {
        ### Check if OTP is matching or not
        $VerificationSessionId=$_REQUEST['VerificationSessionId'];
        $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/VERIFY/$VerificationSessionId/$otpValue"),false);
        $VerificationStatus= $API_Response_json->Details;
    }
    else
    {    
            ### Send OTP
            $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/$mobile/AUTOGEN"),false);
            $VerificationSessionId= $API_Response_json->Details;
    }
	
}

?>



<!--HTML Part-->


<html>
   <head>
      <meta charset="UTF-8">
   </head>
   <body>
   <center>
   <div style="padding-top:30px; padding-right:10%; padding-bottom:30px; width:20%; height:50%; border-style:solid; border-color:black; border-radius:4px;">
      <form style="padding-left:43%;" align="center" action="voter.php" method="post">
         <h2 style="color:blue;">Enter 6-digit OTP sent to your Mobile Number</h2>
         <input type="text" id='otp' name="otp" maxlength="6" placeholder="XXXXXX"  required="required">	
         <input type="hidden" name="VerificationSessionId" value="<?php echo $VerificationSessionId; ?>" >
         <input type="hidden" name="name" value="<?php echo $name; ?>"  >	
         <input type="hidden" name="aadhar" value="<?php echo $aadhar; ?>" >	
		 <input type="hidden" name="voterid" value="<?php echo $voterid; ?>" >
         <input type="hidden" name="mobile" value="<?php echo $mobile; ?>" >
		 <br>
		 <br>
         <input style="background:red; padding:5px color:white" type="submit" value="Submit">
      </form>
   </div>
   </center>
   </body>
</html>

<?php include "footer.php" ;?>