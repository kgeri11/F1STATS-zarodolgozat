<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQueryLocation = "SELECT `name`, COUNT(circuitId) as alkalmak FROM `races` GROUP BY `name` ORDER BY `alkalmak` DESC";


$eredmeny = mysqli_query($conn,$sqlQueryLocation);

$dataLocations = array();
foreach ($eredmeny as $row) {
	$dataLocations[] = $row;
}


mysqli_close($conn);

echo json_encode($dataLocations);
?>