<?php

require_once("../connect.php");
if(isset($_GET['pilota1.']))
{    
    $p1=$_GET['driverId'];
    echo $p1;
}
$sql = "SELECT COUNT(results.driverId) AS indulasok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$p1'";
$result = $conn->query($sql);


if (!$result) {
  die("Hibás sql lekérdezés!");
}