

<?php
session_start();
if (isset($_SESSION['special'])){
$special=$_SESSION['special'];
}

$connection=mysqli_connect("localhost","root","","hospital_management_system");
$districtId = $_GET['district_id'];
$special=$_SESSION['special'];
$query = "

SELECT d.*, a.* FROM doctors d , appointments a WHERE   d.doc_id = a.appo_doc_id and a.start_date='$districtId' AND a.appo_specialization_id = '$special';

";

$result = mysqli_query($connection, $query);

if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['doc_id']}'>{$row['docname']} ({$row['start_time']}-{$row['end_time']})</option>";
}
$option .= "<option value=''>Select Doctor you want</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
