<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQuery = "SELECT DISTINCT driverstandings.driverId,drivers.forename,drivers.surname,driverstandings.wins FROM driverstandings LEFT JOIN drivers ON driverstandings.driverId=drivers.driverId WHERE EXISTS(SELECT null WHERE driverstandings.wins > 6) GROUP BY driverstandings.wins HAVING COUNT(driverstandings.driverId) > 1";


$result = mysqli_query($conn,$sqlQuery);

$dataPole = array();
foreach ($result as $row) {
	$dataPole[] = $row;
}


mysqli_close($conn);

echo json_encode($dataPole);
?>