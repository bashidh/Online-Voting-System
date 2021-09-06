<?php include "header.php";?>
<?php 
include "connection.php";
if(!isset($_SESSION)) {
session_start();
}
$party = $_POST['party'];
$aadhar = $_SESSION['SESS_ID'];

$sql = mysqli_query($con, 'INSERT INTO votecount(aadhar,vote) VALUES("'.$aadhar.'" ,"'.$party.'")');

session_destroy();

?>
<style>
.all-text {
  padding:10px;
  background:lightgray;
  color:black;
  font-size:20px;
  margin:10%;
}
.thankyou{
  color:red;
  font-size:30px;
  text-shadow:1px 1px black;
}
</style>
<body>

<marquee class="thankyou"> Thank you for voting ! </marquee>

<div class="all-text">
 <p><center>"The Election Commission of India is a permanent and independent body established by the Constitution of India directly to ensure free and fair elections in the country. Article 324 of the Constitution provides that the power of superintendence, direction, and control of elections to parliament, state legislatures, the office of the president of India, and the office of vice-president of India shall be vested in the election commission.
 Thus, the Election Commission is an all-India body in the sense that it is common to both the Central government and the state governments."
 </center></p>
</div>

<?php include "footer.php" ;?>



