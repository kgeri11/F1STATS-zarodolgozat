<?php

require_once("../connect.php");

$sql = "SELECT COUNT(results.driverId) AS indulasok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$p1'";
$result = $conn->query($sql);


if (!$result) {
  die("Hibás sql lekérdezés!");
}