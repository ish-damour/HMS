<?php
// Connect to your database
$connection=mysqli_connect("localhost","root","","hospital_management_system");
$cellId = $_GET['cell_id'];

$query = "SELECT * FROM villages WHERE cell_id = '$cellId'";
$result = mysqli_query($connection, $query);

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['village_id']}'>{$row['village_name']}</option>";
}
$option .= "<option value=''>Select Village</option>";
// echo"<option value="">Select cell</option>";
echo $option;
echo $options;
?>
