
<?php
include('patientloginblocker.php'); 
include('../includes/connection.php'); 
if (isset($_POST["add"])) {

	$insurance=$_POST['insurance'];
	$fname=$_POST['fname'];
	$province=$_POST['province'];
	$district=$_POST['district'];
	$sector=$_POST['sector'];
	$cell=$_POST['cell'];
	$village=$_POST['village'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$lname=$_POST['lname'];
	$nid=$_POST['nid'];
	$selectem=mysqli_query($con,"SELECT * FROM patients where pat_nid='$nid'");
	if (mysqli_num_rows($selectem)>0) {
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> NID  Already Exist</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addpatient.php";	
</script>
			<?php

}else{
	// if ($confirm==$password) {
		$se=mysqli_query($con,"INSERT INTO patients SET pat_nid='$nid',pat_fname='$fname',pat_lname='$lname',pat_province='$province',pat_district='$district',pat_sector='$sector',pat_cell='$cell',pat_village='$village',pat_email='$email',pat_contact='$phone',pat_ins='$insurance'");
		if ($se) {
			$message="<div class='alert alert-success text-center'><strong>New PatientsRegistered succcessfull <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addpatient.php";	
</script>
			<?php
		}else{
			$message="<div class='alert alert-danger text-center'><strong>New Docctor Not Added <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="addpatient.php";	
</script>
			<?php
		}	
// 	}else{
		
// 			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Password does not matches</strong></div>";
// 			// Start the session

			
// 			$_SESSION['message']=$message;

// 			?>
<!-- // <script type="text/javascript"> -->
<!-- // window.location.href="addpatient.php";	 -->
<!-- // </script> -->
// 			<?php		
// 	}
		
	// }
}
}

?>