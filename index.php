<?php include "header.php";
session_start();
?>
<?php global $msg; echo $msg;?>
<div style="top:200px; left:0; width:100%; text-align:center; font-size:50px; color:green; text-shadow:1px 1px white; position:fixed;">
<h3>Inorder to make your vote,<br> you must need your unique aadhar id, voter id and<br> phone number linked with aadhar.</h3>
<a href="vote.php"><button style="color:white; width:20%; font-size:30px; padding:5px; background:red; letter-spacing:1px;">Cast Your Vote</button></a>
</div>
<?php include "footer.php";?>
