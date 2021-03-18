<?php
header('Content-Type: application/json');

require_once("connect.php");

$sqlQueryRound = "SELECT year,MAX(round) AS round FROM races GROUP BY year";


$eredmeny = mysqli_query($conn,$sqlQueryRound);

$dataRounds = array();
foreach ($eredmeny as $row) {
	$dataRounds[] = $row;
}


mysqli_close($conn);

echo json_encode($dataRounds);
?>