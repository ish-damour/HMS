<?php
$connection=mysqli_connect("localhost","root","","hospital_management_system");

$sectorId = $_GET['sector_id'];

$query = "SELECT * FROM cells WHERE sector_id = '$sectorId'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    
    $options .= "<option value='{$row['cell_id']}'>{$row['cell_name']}</option>";
}
$option .= "<option value=''>Select cell</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
