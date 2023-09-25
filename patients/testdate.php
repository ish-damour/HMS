
<form method="post">
	<input type="date" name="st">
	<input type="date" name="en">
	<input type="submit" name="hh" value="hhh">
</form>
<?php
if (isset($_POST["hh"])) {
$st=$_POST['st'];
$en=$_POST["en"];
$startDate = strtotime($st); // Convert start date to timestamp
$endDate = strtotime($en);   // Convert end date to timestamp
$maxPatientsPerDay = 2;

// Calculate the total number of days in the range
$totalDays = ceil(($endDate - $startDate) / (60 * 60 * 24)) + 1;

// Calculate the total number of patients
$totalPatients = $totalDays * $maxPatientsPerDay;

echo "Total days: $totalDays\n";
echo "Total patients: $totalPatients\n";


}


?>
