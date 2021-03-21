<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQueryIndulas = "SELECT DISTINCT results.driverId,drivers.surname, COUNT(results.raceId) AS start FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId GROUP BY results.driverId HAVING start > 200 ORDER BY `start` DESC";


$result = mysqli_query($conn,$sqlQueryIndulas);

$dataIndulas = array();
foreach ($result as $row) {
	$dataIndulas[] = $row;
}


mysqli_close($conn);

echo json_encode($dataIndulas);
?>