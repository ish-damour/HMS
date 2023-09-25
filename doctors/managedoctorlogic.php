<?php
include('../includes/connection.php'); 
session_start();
if (isset($_POST["updatedoctor"])) {
	$doc_id=$_POST["doc_id"];
	$Specialization=$_POST['Specialization'];
	$docname=$_POST['docname'];
	$province=$_POST['docprovince'];
	$district=$_POST['district'];
	$sector=$_POST['sector'];
	$cell=$_POST['cell'];
	$village=$_POST['village'];
	$doccontact=$_POST['doccontact'];
	$docemail=$_POST['docemail'];	
	$selectem=mysqli_query($con,"SELECT * FROM doctors where docemail='$docemail'");
	$selectup=mysqli_query($con,"SELECT * FROM doctors");
	if (strlen($doccontact)==10) {

	if (mysqli_num_rows($selectem)>1) {
			$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> Email Address Already Used by other user Please try an other</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="managedoctors.php";	
</script>
			<?php

}else{
		$se=mysqli_query($con,"UPDATE doctors SET Specialization='$Specialization',docname='$docname',docprovince='$province',docdistrict='$district',docsector='$sector',doccell='$cell',docvillage='$village',docemail='$docemail',doccontact='$doccontact' WHERE doc_id='$doc_id'");
		if ($se) {

			$message="<div class='alert alert-success text-center'><strong>Docctor info updated <i class='far fa-smile'></i></strong></div>";
			// Start the session
			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="managedoctors.php";	
</script>
			<?php
		}else{
			$message="<div class='alert alert-danger text-center'><strong>New Docctor Not Added <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="managedoctors.php";	
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
window.location.href="managedoctors.php";	
</script>
			<?php		
	}
}

?>









