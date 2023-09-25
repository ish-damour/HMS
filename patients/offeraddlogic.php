
<?php
session_start();
if (!isset($_SESSION["loggedemail"]) or !isset($_SESSION['loggedname'] ) or !isset($_SESSION['loggedid'] ) ) {
  ?>
<script type="text/javascript">
window.location.href="login.php"; 
</script>
  <?php
}else{
  $loggedname=$_SESSION['loggedname'];
  $loggedemail=$_SESSION['loggedemail'];
  $loggedid=$_SESSION["loggedid"];
}
?>
<?php
include('../includes/connection.php'); 
if (isset($_POST["generate"])) {

	$Specialization=$_POST['Specialization'];
	$startdate=$_POST['startdate'];
	$starttime=$_POST['starttime'];
	$place=$_POST['place'];
	$maxnumber=$_POST['maxnumber'];
	$enddate=$_POST['enddate'];
	$endtime=$_POST['endtime'];
	// $doccontact=$_POST['doccontact'];
	// $docemail=$_POST['docemail'];
	// $password=$_POST['password'];
	if ($endtime > $starttime) {

if ($enddate >= $startdate) {

	// $confirm=$_POST['confirm'];	
$selectem=mysqli_query($con,"SELECT * FROM appointments where doc_id='$loggedid' and end_date >='$startdate'");
	if (mysqli_num_rows($selectem)>0) {

			$message="<div class='alert alert-danger text-center'><strong> You have other Appointment given on that date<i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addoffer.php";	
</script>
			<?php

	}else{
		$se=mysqli_query($con,"INSERT INTO appointments SET specialization_id='$Specialization',doc_id='$loggedid',numberofpatient='$maxnumber',start_date='$startdate',start_time='$starttime',place='$place' ,end_date='$enddate',end_time='$endtime' ");
		if ($se) {
			$message="<div class='alert alert-success text-center'><strong>New Appointment  Given succcessfull <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addoffer.php";	
</script>
			<?php
		}else{
			$message="<div class='alert alert-danger text-center'><strong>New Docctor Not Added <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addoffer.php";	
</script>
			<?php
		}	
		
	}
	}else{
		
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> startdate can not be greater than enddate</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addoffer.php";	
</script>
			<?php		
	}

			// $message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Email Address Already Exist</strong></div>";
			// // Start the session

			
			// $_SESSION['message']=$message;

			?>
<!-- <script type="text/javascript">
window.location.href="adddoctor.php";	
</script> -->
			<?php

}else{
		
			$message="<div class='alert alert-warning text-center'><strong>starting time can not be greater than end time <i class='fas fa-exclamation-triangle'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addoffer.php";	
</script>
			<?php		
	}
}

?>