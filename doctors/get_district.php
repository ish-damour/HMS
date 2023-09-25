<?php
$connection=mysqli_connect("localhost","root","","hospital_management_system");

$provinceId = $_GET['province_id'];

$query = "SELECT * FROM district WHERE province_id = '$provinceId'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['district_id']}'>{$row['district_name']}</option>";
}
$option .= "<option value=''>Select District</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
