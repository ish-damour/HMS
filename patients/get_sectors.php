<?php
$connection=mysqli_connect("localhost","root","","hospital_management_system");

$districtId = $_GET['district_id'];

$query = "SELECT * FROM sector WHERE district_id ='$districtId'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['sector_id']}'>{$row['sector_name']}</option>";
}
$option .= "<option value=''>Select Sector</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
