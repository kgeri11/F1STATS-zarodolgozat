<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","f1_1950-2020_adatbazis","3306");

$sqlQuery = "SELECT DISTINCT driverstandings.driverId,drivers.forename,drivers.surname,driverstandings.wins FROM driverstandings LEFT JOIN drivers ON driverstandings.driverId=drivers.driverId WHERE EXISTS(SELECT null WHERE driverstandings.wins > 6) GROUP BY driverstandings.wins HAVING COUNT(driverstandings.driverId) > 1";


$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}


mysqli_close($conn);

echo json_encode($data);
?>