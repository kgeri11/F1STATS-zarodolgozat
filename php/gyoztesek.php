<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQuery = "SELECT DISTINCT results.driverId,drivers.surname, COUNT(results.positionOrder) AS wins FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId WHERE results.positionOrder = '1' GROUP BY results.driverId HAVING wins > 15 ORDER BY `wins` ASC";


$result = mysqli_query($conn,$sqlQuery);

$dataPole = array();
foreach ($result as $row) {
	$dataPole[] = $row;
}


mysqli_close($conn);

echo json_encode($dataPole);
?>