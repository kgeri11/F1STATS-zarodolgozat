<?php
header('Content-Type: application/json');

require_once('db.php');

$sqlQuery = "SELECT `driverId`,`wins` FROM `driverstandings` ORDER BY `driverstandings`.`wins` DESC";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>