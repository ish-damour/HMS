
<?php
include('patientloginblocker.php'); 
include('../includes/connection.php'); 









if (isset($_POST["add"])) {
	$pat_nid=$_POST['nid'];
	$Specialization=$_POST["province"];
	$startdate=$_POST['district'];

	$doc_id=$_POST['sector'];
	// $book_start_time=$_POST['district'];
	// $book_place=$_POST['sector'];
	// $book_end_time=$_POST['cell'];
	// $book_register_id=$_POST['village'];
	// $book_patient_id=$_POST['phone'];
	// $status=$_POST['email'];
	// $lname=$_POST['lname'];
	// $nid=$_POST['nid'];
// SELECT * FROM appointments a,doctors d,patients p,where a.start_date='2023-09-22' and d.doc_id=a.appo_doc_id and p.pat_nid='119280070090909090' and d.doc_id=35 ;
$selectall=mysqli_query($con,"SELECT * FROM appointments a,doctors d,patients p,doctor_specialization ds  where a.start_date='$startdate' and d.doc_id=a.appo_doc_id and p.pat_nid='$pat_nid' and d.doc_id='$doc_id'and ds.Specialization_id=a.appo_specialization_id;");


if (mysqli_num_rows($selectall)>0) {
$selectallfec=mysqli_fetch_array($selectall);
$gbook_appo_id=$selectallfec["appointment_id"];
$gbook_date=$selectallfec["start_date"];
$gbookstart_time=$selectallfec["start_time"];
$gbook_remain_number=$selectallfec["remainplaces"];
$gbook_patient_number=$selectallfec["numberofpatient"];
$gbook_place=$selectallfec["place"];
$gbook_endtime=$selectallfec["end_time"];
$gbook_register=$loggedid;
$gbook_patient_id=$selectallfec["pat_id"];
$gbook_status="Booked";
$gbook_patient_name=$selectallfec["pat_fname"]." ".$selectallfec["pat_lname"];
$gbook_doc_name=$selectallfec["docname"];
$gbook_specialization_name=$selectallfec["docspecialization"];

$selectbook=mysqli_query($con,"SELECT * FROM appointmentsbooked where book_patient_id='$gbook_patient_id' and book_date ='$gbook_date'");

if (mysqli_num_rows($selectbook)>0) {
	
				$message="<div class='alert alert-warning text-center'><strong> <i class='fas fa-exclamation-triangle'></i> This Patients have another appointment on this day</strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
window.location.href="bookappointments.php";	
</script>
			<?php

}else{

$book_number_remain=$gbook_remain_number-1;
$youarenumber=$gbook_patient_number-$book_number_remain;


		$addapoo=mysqli_query($con,"INSERT INTO appointmentsbooked SET book_appointment_id='$gbook_appo_id',book_patient_id='$gbook_patient_id',book_patientnumber='$youarenumber',book_date='$gbook_date',book_start_time='$gbookstart_time',book_place='$gbook_place',end_time='$gbook_endtime',book_register_id='$loggedid',status='Booked' ");
		if ($addapoo) {


$updremain=mysqli_query($con,"UPDATE appointments SET remainplaces='$book_number_remain' WHERE appointment_id ='$gbook_appo_id'");




			$message="<div class='alert alert-success text-center'><strong>appointment booked succcessfull <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;
$path="acceptance.php?pat_name=".$gbook_patient_name."&doc_name=".$gbook_doc_name."&sdate=".$gbook_date."&stime=".$gbookstart_time."-".$gbook_endtime."&location=".$gbook_place."&ticket=".$youarenumber."&special=".$gbook_specialization_name;
			?>
<script type="text/javascript">
window.location.href="<?php echo $path?>";	
</script>
			<?php
		}else{
			$message="<div class='alert alert-danger text-center'><strong>There was an error occured while booking <i class='far fa-smile'></i></strong></div>";
			// Start the session

			
			$_SESSION['message']=$message;

			?>
<script type="text/javascript">
// window.location.href="addoffer.php";	
</script>
byanseee
			<?php
		}	
		
	}









// echo $book_number;
// function registerPatient(&$gbook_remain_number) {
//     if ($gbook_remain_number > 0) {
//         $gbook_remain_number--;
//         return true;
//     } else {
//         return false;
//     }
// }
// for ($i = 1; $i <= 1; $i++) {
//     if (registerPatient($gbook_remain_number)) {
        echo "ReaminPatient places $book_number_remain registered. Your registration number is $youarenumber.<br>";




    // } else {
    //     echo "Sorry, no more slots available.<br>";
    // }




}else{
echo "ntabirimo".$pat_nid;
}}

?>