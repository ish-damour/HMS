<?php
include('../includes/connection.php'); 
session_start();
if (isset($_POST["add"])) {

	$Specialization=$_POST['Specialization'];
	$docname=$_POST['docname'];
	$province=$_POST['province'];
	$district=$_POST['district'];
	$sector=$_POST['sector'];
	$cell=$_POST['cell'];
	$village=$_POST['village'];
	$doccontact=$_POST['doccontact'];
	$docemail=$_POST['docemail'];
	$password=$_POST['password'];
	$confirm=$_POST['confirm'];	
	$selectem=mysqli_query($con,"SELECT * FROM doctors where docemail='$docemail'");
	if (strlen($doccontact)==10) {
	if (mysqli_num_rows($selectem)>0) {
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Email Address Already Exist</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="adddoctor.php";	
</script>
			<?php

}else{
	if ($confirm==$password) {
		$se=mysqli_query($con,"INSERT INTO doctors SET Specialization='$Specialization',docname='$docname',docprovince='$province',docdistrict='$district',docsector='$sector',doccell='$cell',docvillage='$village',docemail='$docemail',doccontact='$doccontact',password='$password'");
		if ($se) {
			$message="<div class='alert alert-success text-center'><strong>New Docctor added succcessfull <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="adddoctor.php";	
</script>
			<?php
		}else{
			$message="<div class='alert alert-danger text-center'><strong>New Docctor Not Added <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="adddoctor.php";	
</script>
			<?php
		}	
	}else{
		
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Password does not matches</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="adddoctor.php";	
</script>
			<?php		
	}
		
	}
}else{
		
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Phone number characters must be = 10</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="adddoctor.php";	
</script>
			<?php		
	}
}

?>