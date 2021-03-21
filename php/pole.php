<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQueryPole = "SELECT results.driverId,drivers.surname, COUNT(results.grid) AS pole FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId WHERE results.grid = '1' GROUP BY results.driverId HAVING pole > 15 ORDER BY `pole` ASC";


$result = mysqli_query($conn,$sqlQueryPole);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}


mysqli_close($conn);

echo json_encode($data);
?>

