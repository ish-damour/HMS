<?php
session_start();
$connection=mysqli_connect("localhost","root","","hospital_management_system");

$provinceId = $_GET['province_id'];
$todai=date("Y-m-d");
$query = "
SELECT DISTINCT appointments.start_date, doctor_specialization.*  FROM appointments  JOIN doctor_specialization ON  appointments.appo_specialization_id=doctor_specialization.Specialization_id and appointments.appo_specialization_id='$provinceId';

-- WITH RECURSIVE date_range AS ( SELECT start_date AS date FROM appointments WHERE appo_specialization_id = '$provinceId' UNION ALL SELECT date + 1 FROM date_range JOIN appointments ON date + 1 <= end_date AND appo_specialization_id = '$provinceId' ) SELECT DISTINCT  FROM date_range ;
-- ";


$result = mysqli_query($connection, $query);

if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['start_date']>$todai) {
         $options .= "<option value='{$row['start_date']}'>{$row['start_date']}</option>";    
 $_SESSION['special']=$provinceId;       
    }

}
$option .= "<option value=''>Select Date</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
